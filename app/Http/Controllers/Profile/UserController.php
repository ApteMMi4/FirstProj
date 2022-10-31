<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\CabinetController;
use App\Http\Requests\TransactionUrlRequest;
use App\Models\Conclusions;
use App\Models\PaymentForm;
use App\Models\PaymentList;
use App\Models\Transactions;
use App\Models\User;
use Database\Seeders\UsersSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;

class UserController extends CabinetController
{


    public function __construct()
    {

        if(\request()->get('twofagoogleset')){
            $this->middleware(['auth','2fa']);

        }else{
            $this->middleware(['auth']);
        }
//        if (auth()->user()->is2Fa())
//        {
//            $this->middleware(['2fa']);
//        }


    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staticSum = Transactions::where('status','success')->where('currency', 'UAH')->sum('amount');
        $allSum = Transactions::where('status','success')->where('currency', 'UAH')->sum('total');

        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        if (auth()->user()->isUser())
            return view('profile.dashboard', compact('staticSum', 'allSum'), ['trans'=>$transactions->groupBy('currency')]);

        if(auth()->user()->isAdmin())
        return view('profile.index', compact('staticSum', 'allSum'), ['trans'=>$transactions->groupBy('currency')]);

    }

    /**
     *
     *
     *
     * @param  \App\Models\User  $user
     *
     */
    public function me(Request $request)
    {

        $user = Auth::user();


//        $registration_data = [
//            'email'=>$user->email,
//        ];
//        $google2fa = app('pragmarx.google2fa');
//
//
//
//        if(!$user->twofagoogle){
//            $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
//            $QR_Image = $google2fa->getQRCodeInline(
//                config('app.name'),
//                $registration_data['email'],
//                $registration_data['google2fa_secret']
//            );
//
//            $request->session()->flash('registration_data', $registration_data);
//
//        }else{
//            $QR_Image = '';
//            $registration_data["google2fa_secret"] = $user->google2fa_secret;
//        }

        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();



        return view('profile.me',[
            'user'=>$user,
//            'QR_Image' => $QR_Image,
            'trans'=>$transactions->groupBy('currency'),
//            'secret' => $registration_data['google2fa_secret'
//           ]
        ]);
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        $user = User::query()->where('id',$request->post('id'));
        $user->update([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'kuna'=>$request->post('kuna'),
        ]);

        $user_currency = User::query()->where('id',$request->post('id'));
        $user_currency->update(['4bil'=>$request->post('4bil'),
            'global'=>$request->post('global'),
        ]);




        return redirect()->route('profile_me')->with('success','Пользователь обновлен!');
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function twoFaGoogle(Request $request)
    {
        $user = Auth::user();


        $user->update([
            'twofagoogle'=>$request->post('twofagoogle'),
            'google2fa_secret'=>$request->post('google2fa_secret'),
        ]);



        if (Auth::user()->role == 'user')
        return redirect()->route('profile_pcProtect')->with('error','Двух-факторная авторизация включена');

        if (Auth::user()->role == 'admin')
            return redirect()->route('profile_adminMe')->with('error','Двух-факторная авторизация включена');
    }



    public function transactions(Request $request)
    {
        $build = Transactions::select('*')->with('user');

        if ($request->has('shop_id')){
            $build->where($request->get('shop_id'), $request->get('value'));
        }
        $build->orderBy('id', 'desc');

        if ($request->has('select'))
        {
            $build->where($request->get('select'), $request->get('value'));
        }
        if ($request->has('status'))
        {
            $build->where('status',$request->get('status'));
        }
        if ($request->has('limit'))
        {
            $users = $build->paginate($request->get('limit'));
        }
        else
        {
            $users = $build->paginate(10);
        }


        return view('profile.transactions', compact('users'));
    }

    public function conclusions()
    {
        if (auth()->user()->isUser())
        {
            $conslusions = Conclusions::where('user_id',auth()->id())->orderBy('id', 'desc')->paginate(15);
        }
        else{
            $conslusions = Conclusions::select('*')->orderBy('id', 'desc')->paginate(15);
        }

        return view ('profile.conclusions',compact('conslusions'));
    }

    public function currencies()
    {
        return view('profile.currencies');
    }

    public function withdrawalHistory()
    {
        $conslusions = Conclusions::where('user_id',auth()->id())->orderBy('id', 'desc')->paginate(15);


        return view ('profile.withdrawalHistory',compact('conslusions'));
    }
    public function userPage()
    {
        $transactions = Transactions::where('uder_id', auth()->id())->where('status', '!=', Transactions::BLOCK)->orderBy('id', 'desc')->get();
        return view('profile.userPage', ['trans'=>$transactions]);
    }

    public function discount()
    {
        return view('profile.discount');
    }

    public function affilProgram()
    {
        return view('profile.affilProgram');
    }

    public function fastOutput()
    {
        return view('profile.fastOutput');
    }
    public function invoice()
    {
        $currency = 'UAH';
        $listPay = PaymentList::where('currency', $currency)->pluck('name', 'id');
        $copyListPay = $listPay->toArray();
        $key = array_key_first($copyListPay);
        $payActual = array_shift($copyListPay);
        $paymList = PaymentForm::where('user_id', auth()->id())->orderBy('id', 'desc')->get();


        return view('profile.invoice', compact('listPay','paymList'));
    }

    public function arbitraryPaymentSave(TransactionUrlRequest $request)
    {
        $transaction = Transactions::create([
            'amount'=>$request->get('payment'),
            'status'=>'process',
            'currency'=> 5,
            'shop_id'=>auth()->user()->id,
            'total'=>0,
        ]);

       $paymList = PaymentList::find($request->get('listpay'));
        $payForm = PaymentForm::create([
            'user_id'=>auth()->user()->id,
            'sum'=>$request->get('payment'),
            'payment'=>$paymList->name,
            'transaction_id'=> $transaction->id
            ]);

        $array = [
            'user_id'=>auth()->user()->id,
            'currency'=>'UAH',
            'payment'=>$request->get('payment'),
            'url_id'=>$payForm->id,
            'payment_name'=>$paymList->name
        ];
        $hash = base64_encode(implode(',', $array));
        $payForm->url = env('APP_URL').'/form/card/'.$hash;
        $payForm->save();
        $transaction->url_id = $payForm->id;
        $transaction->save();

        return redirect(route('profile_arbitraryPaymentSave'));
    }
    public function dashboard()
    {
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        return view('profile.dashboard', ['trans'=>$transactions->groupBy('currency')]);
    }
    public function history(Request $request)
    {
        $build = Transactions::where('shop_id', auth()->id());

        if ($request->has('select'))
        {
            $build->where($request->get('select'), $request->get('value'));
        }
        if ($request->has('status'))
        {
            $build->where('status',$request->get('status'));
        }

        $build->orderBy('id', 'desc');

        if ($request->has('limit'))
        {
            $transactions = $build->paginate($request->get('limit'));

        }
        else
        {
            $transactions = $build->paginate(10);
        }

        return view('profile.history', ['trans'=>$transactions]);
    }
    public function withdrawal(Request $request)
    {
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        return view('profile.withdrawal', ['trans'=>$transactions->groupBy('currency')]);
    }

    public function conclusionsStore(TransactionUrlRequest $request)
    {

        $vivod = $request->all();
        $vivod ['user_id']= auth()->id();
        $transTotal = Transactions::where('shop_id',auth()->id())->sum('total');


        if($transTotal < $vivod ['sum']){
            return back()->with('success', 'Не достаточно денег на счету!');
        }


//        Conclusions::create($vivod);


        if($transTotal >= 0){

            Conclusions::create($vivod);

            $transMass = ['total'=>(floor($vivod ['sum'])*-1), 'currency'=>'UAH', 'status'=>'success','shop_id'=>auth()->id()];
            Transactions::create($transMass);
        }


        return back()->with('success', 'Заявка отправлена!');
    }

    public function conclusionsPays()
    {
        return view('profile.conclusionsPays');
}
    public function payCode()
    {
        return view('profile.payCode');
    }
    public function exchange()
    {
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        return view('profile.exchange', ['trans'=>$transactions->groupBy('currency')]);
    }
    public function transfers()
    {
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        return view('profile.transfers', ['trans'=>$transactions->groupBy('currency')]);
    }
    public function verify()
    {
        return view('profile.verify');
    }
    public function news()
    {
        return view('profile.news');
    }
    public function sample()
    {
        return view('profile.sample');
    }

    public function pcTransactions()
    {
        return view('profile.pcTransactions');
    }

    public function discUser()
    {
        return view('profile.discUser');
    }
    public function pcAlert()
    {
        return view('profile.pcAlert');
    }
    public function pcProtect(Request $request)
    {

        $user = Auth::user();

        $registration_data = [
            'email'=>$user->email,
        ];
        $google2fa = app('pragmarx.google2fa');



        if(!$user->twofagoogle){
            $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );

            $request->session()->flash('registration_data', $registration_data);

        }else{
            $QR_Image = '';
            $registration_data["google2fa_secret"] = $user->google2fa_secret;
        }
        return view('profile.pcProtect',[
            'user'=>$user,
            'QR_Image' => $QR_Image,
            'secret' => $registration_data['google2fa_secret'
            ]
        ]);
    }
    public function pcApi()
    {
        return view('profile.pcApi');
    }
    public function changePass()
    {
        return view('profile.changePass');
    }

    public function adminMe(Request $request)
    {
        $user = Auth::user();


        $registration_data = [
            'email'=>$user->email,
        ];
        $google2fa = app('pragmarx.google2fa');



        if(!$user->twofagoogle){
            $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );

            $request->session()->flash('registration_data', $registration_data);

        }else{
            $QR_Image = '';
            $registration_data["google2fa_secret"] = $user->google2fa_secret;
        }

        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();



        return view('profile.adminMe',[
            'user'=>$user,
            'QR_Image' => $QR_Image,
            'trans'=>$transactions->groupBy('currency'),
            'secret' => $registration_data['google2fa_secret'
            ]
        ]);
    }
    public function statusTransactionUpdate(Request $request)
    {
        $transaction_id = $request->get('id');
        $status = $request->get('stat');

        $statusTrans= Transactions::find($transaction_id);
        $statusTrans->status = $status;
        $statusTrans->save();

        $listStatus=[
            'success'=>'Выполнен',
            'fail'=>'Не оплачен',
            'block'=>'Не выполнен'
        ];
        return ['status'=>$listStatus[$status]];

    }

    //Footer--Menu

    public function payKode24()
    {
        return view('footerMenu.payKode24');
    }

    public function fees()
    {
        return view('footerMenu.fees');
    }

    public function invoices()
    {
        return view('footerMenu.invoices');
    }


    public function fAQ()
    {
        return view('footerMenu.fAQ');
    }

    public function blog()
    {
        return view('footerMenu.blog');
    }

    public function partners()
    {
        return view('footerMenu.partners');
    }

    public function agreement()
    {
        return view('footerMenu.agreement');
    }

    public function privacyPolicy()
    {
        return view('footerMenu.privacyPolicy');
    }

    public function amlKYCPolicy()
    {
        return view('footerMenu.amlKYCPolicy');
    }



}
