<?php

namespace App\Http\Controllers;

use App\Events\TransactionProcessed;
use App\Models\FreezingAmount;
use App\Models\Payment;
use App\Models\PaymentForm;
use App\Models\Shop;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\PaymentList;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Payments\Facades\PaymentsFacad as Payments;
use Payments\Collection\Dto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($payment, $hash)
    {
//        $shop_id, $currency, $price, $url_id
        $str = base64_decode($hash);
        $arr = explode(',', $str);

        $shop_id = $arr[0];
        $currency = $arr[1];
        $price = $arr[2];
        $url_id = $arr[3];
        $payment = $arr[4];

        $pay = PaymentList::where('name', $payment)->where('currency', $currency)->first();

        $paymForm = PaymentForm::where('user_id', $shop_id)->where('blocked', 0)->where('id', $url_id)->first();


        if(!$paymForm){

            $paymForm = PaymentForm::where('user_id', $shop_id)->where('id', $url_id)->first();

            $point = config('payments.'.$payment.'.point');
            $mass3 = [$paymForm->transaction_id,request()->getClientIp() , 'fail'];
            $hash3 = base64_encode(implode(',' , $mass3));
            $failUrl  = env('APP_URL').'/notPass/' . $hash3;

            return redirect(route('order_fail' , ['transaction_hash' => $hash3]), 301);
        }
        $transaction = Transactions::find($paymForm->transaction_id);


        if($price < $pay->limit){
            throw new \Exception('Миннимальная сумма 100', 400);
        }

        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $pay_sum = $price * ($pay->percent / 100);   //сумма комиссий платежки
        $sum = $price * ($percent / 100);  //сумма процента внутренней системы

        $total = $price - $sum; //+ $pay_sum  + $pay->commission + $commission;
        $tot2 = $price + $commission;
        $total2 = $tot2;
        $tot2 *= 100;

        if ($pay->serv_limit != 0 && $pay->serv_limit < $price) {
            abort('Привышение лимитов платежа!', 406);
        }

        $createAtt = $paymForm->created_at->addMinutes(20);
        $now = Carbon::now()->timestamp;
        $createAt = $paymForm->created_at->addMinutes(20)->timestamp;
        $jsCreateAtt = $createAt*1000;

         Session::put('orderTime', 'Artem Privet');


//        $jsNow = $now*1000.0000009394591;



        if (!is_null($transaction->pay_result)){

            $payResult = json_decode($transaction->pay_result, true);

        }

        else {

                 $transaction->amount=$price;
                 $transaction->status='process';
                 $transaction->currency=$currency;
                 $transaction->shop_id=$shop_id;
                 $transaction->payment=$payment;
                $transaction->total=$total;
//                 $transaction->total=$total2;
                 $transaction->pay_commission=$pay_sum;
                 $transaction->pay_percent=$pay->percent;
                 $transaction->pay_limit=$pay->limit;
                 $transaction->serv_commission=$pay->serv_commission;
                 $transaction->serv_percent=$pay->serv_percent;
                 $transaction->serv_limit=$pay->serv_limit;
                 $transaction->save();


            $dto = new Dto([
                'payment' => $payment,
                'transaction_id' => $transaction->id,
                'shop_id' => $shop_id,
                'currency' => $currency,
                'price' => $tot2]);

            $payResult = Payments::transactionCreate($dto);
            $transaction->pay_result = json_encode($payResult);
            $transaction->save();



            if ($payResult['error']['code'] > 0) {
                dump($payResult);
                abort(401);
            }

        }



        $transaction_id =$transaction->id;


        $point = config('payments.'.$payment.'.point');
        $mass3 = [$transaction_id,request()->getClientIp() , 'fail'];
        $hash3 = base64_encode(implode(',' , $mass3));
        $failUrl  = env('APP_URL').'/notPass/' . $hash3;

        if ($now > $createAt && $transaction->status == 'process'){

            $transaction->status='block';
            $transaction->save();

            return redirect(route('order_fail' , ['transaction_hash' => $hash3]), 301);
        }


//        $newSession = Session::get('orderTime');


        return view('order.order', compact('payResult', 'transaction_id', 'price', 'currency', 'shop_id', 'payment', 'total', 'tot2','now', 'createAt', 'createAtt', 'jsCreateAtt', 'failUrl'));

    }

//    public function universal($hash)
//    {
//
//        $str = base64_decode($hash);
//        $arr = explode(',', $str);
//
//        $transaction_id = $arr[0];
//        $functions = end($arr);
//
//      return $this->{$functions}($transaction_id);
//
//    }



    public function callback($hash)
    {
        $str = base64_decode($hash);
        $arr = explode(',', $str);

        $transaction_id = $arr[0];
        $functions = end($arr);

        $url = request()->fullUrl();

        $transac = Transactions::find($transaction_id);
        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->where('id', $transac->url_id)->first();

        if($transac->status == 'process' ){

            $transac->status = 'fail';
            $transac->save();


            $payInfo->status = 0;
            $payInfo->blocked = 1;
            $payInfo->url = $url;
            $payInfo->save();

            return view('order.fail', compact('transac', 'payInfo'));

        }

        if ($transac->status == 'success')
            return view('order.success', compact('transac', 'payInfo'));
    }

    public function success($hash)
    {
        $str = base64_decode($hash);
        $arr = explode(',', $str);
        $transaction_id = $arr[0];

        $url = request()->fullUrl();

        $transac = Transactions::find($transaction_id);
        if($transac->status != 'process' && $transac->status != 'success'){

            $mass3 = [$transac->id,request()->getClientIp() , 'fail'];
            $hash3 = base64_encode(implode(',' , $mass3));

           return redirect(route('order_fail', ['transaction_hash' => $hash3]), 301);
        }
        if ($transac->status == 'process')
        {
            request()->request->add(['payment'=>'settlepay']);

            $dto = new Dto([
                'external_transaction_id' => $transac->id,
            ]);
            $payResult = Payments::transactionFind($dto);

            if (isset($payResult ['error']) && isset($payResult ['error']['code']) && $payResult ['error']['code']>0){

                $point = config('payments.settlepay.point');
                $mass3 = [$transac->id,request()->getClientIp() , 'fail'];
                $hash3 = base64_encode(implode(',' , $mass3));
                $failUrl  = str_replace('{transaction_hash}', $hash3, $point ['fail_url']);

                return redirect(route('order_fail' , ['transaction_hash' => $hash3]), 301);

            }
        }


        $transac->status = 'success';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->where('id', $transac->url_id)->first();
        $payInfo->status = 0;
        $payInfo->status = 1;
        $payInfo->url = $url;
        $payInfo->save();

        return view('order.success', compact('transac', 'payInfo'));
    }

    public function fail($hash)
    {

        $str = base64_decode($hash);
        $arr = explode(',', $str);
        $transaction_id = $arr[0];

        $url = request()->fullUrl();

        $transac = Transactions::find($transaction_id);
        $transac->status = 'fail';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->where('id', $transac->url_id)->first();
        $payInfo->status = 0;
        $payInfo->blocked = 1;
        $payInfo->url = $url;
        $payInfo->save();

        return view('order.fail', compact('transac', 'payInfo'));
    }

    public function block($hash)
    {
        $str = base64_decode($hash);
        $arr = explode(',', $str);
        $transaction_id = $arr[0];

        $url = request()->fullUrl();

        $transac = Transactions::find($transaction_id);
        $transac->status = 'block';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->where('id', $transac->url_id)->first();
        $payInfo->status = 0;
        $payInfo->blocked = 1;
        $payInfo->url = $url;
        $payInfo->save();

        return view('order.block', compact('transac', 'payInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payCul(Request $request)
    {
        dd($request->all());
        $payment_list_id = $request->get('payment_list_id');
        $shop_id = $request->get('shop_id');
        $transaction_id = $request->get('transaction_id');
        $price = $request->get('price');
        $pay = PaymentList::find($payment_list_id);
//        $user = User::find($shop_id);
//        $wallet = $user->payments()->where('currency', $pay->currency)->where('slug', $pay->slug)->first();
        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $pay_sum = $price * ($pay->percent / 100);   //сумма комиссий платежки
        $sum = $price * ($percent / 100);  //сумма процента внутренней системы

        $total = $price + $pay_sum + $sum + $pay->commission + $commission;

        if ($pay->limit != 0 && $total > $pay->limit) {
            abort('Привышение лимитов платежа!', 406);
        }

        if ($limit != 0 && $total > $limit) {
            abort('Привышение внутренних лимитов!', 406);
        }

        return [
            'total' => $total,
            'pay' => [
                'commission' => $pay->commission,
                'percent' => $pay->percent,
                'limit' => $pay->limit,
                'number' => $pay->number
            ],
            'serv' => [
                'commission' => $commission,
                'percent' => $percent,
                'limit' => $limit
            ],
            'shop' =>[
                'action' => $pay->action,
//                'method' => $pay->method,
                'params' => $pay->params
            ]
        ];
    }

    public function paySubmit(Request $request)
    {
        $payment_list_id = $request->get('payment_list_id');
        $shop_id = $request->get('shop_id');
        $transaction_id = $request->get('transaction_id');
        $price = $request->get('price');
        $total = $request->get('total');
        $user = User::find($shop_id);
        $pay = PaymentList::find($payment_list_id);
        $wallet = $user->payments()->where('currency', $pay->currency)->where('slug', $pay->slug)->first();
        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $transaction = new Transactions();
        $data = [
            'transaction_id' => $transaction_id,
            'payment_id' => $wallet->id,
            'pay_id' => $pay->id,
            'amount' => $price,
            'status' => 'process',
            'currency' => $pay->currency,
            'shop_id' => $user->id,
            'total' => $total,
            'pay_commission' => $pay->commission,
            'pay_percent' => $pay->percent,
            'pay_limit' => $pay->limit,
            'serv_commission' => $commission,
            'serv_percent' => $percent,
            'serv_limit' => $limit,
            'from' => 'client',
            'to' => 'shop'
        ];
        $transaction->fill($data);
        $transaction->save();

        event(new TransactionProcessed($transaction));
    }

}
