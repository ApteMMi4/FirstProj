<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Response;
use Illuminate\Support\Facades\DB;

use App\Models\Paycode;
use App\Models\User;

class PaycodeUserController extends Controller
{
    //Api methods
    public function indexJson()
    {
      $paycodes = Paycode::all();

      return Response::json([
        'paycodes' => $paycodes
      ], 200);

    }

    public function showJson($id)
    {
      $paycode = Paycode::findOrFail($id);

      return Response::json([
        'paycode' => $paycode
      ], 200);
    }
    public function showByCodeJson(Request $request)
    {
      if(isset($request->status))
      {
        $paycode = Paycode::where('paycode_id', $request->paycode_id)->where('status', $request->status)->first();
      }
      else
      {
        $paycode = Paycode::where('paycode_id', $request->paycode_id)->first();
      }

      if(isset($paycode) && $paycode != null)
      {
        if($request->action_type == 'show')
        {
          return Response::json([
            'paycode' => $paycode,
            'paycode_id' => $paycode->paycode_id,
            'paycode_amount' => price_format($paycode->paycode_amount) . ' ' . $paycode->paycode_currency,
            'paycode_created_at' => $paycode->created_at->format('d.m.Y'),
          ], 200);
        }
        if($request->action_type == 'redeem' && $paycode->staus == 0)
        {
          $paycode->status = 1;
          $paycode->user_id_to = Auth::user()->id;
          $paycode->save();

          Auth::user()->UAH = Auth::user()->UAH + $paycode->paycode_amount;
          Auth::user()->save();

          return Response::json([
            'paycode' => $paycode,
            'paycode_id' => $paycode->paycode_id,
            'paycode_amount' => price_format($paycode->paycode_amount) . ' ' . $paycode->paycode_currency,
            'paycode_created_at' => $paycode->created_at->format('d.m.Y'),
          ], 200);
        }

      }
      else
      {
        return Response::json([
          'paycode' => 'fail'
        ], 200);
      }
    }

    public function storeJson(Request $request)
    {
      $data = [
        'user_id_from' => $request->user_id_from,
        'user_id_to' => $request->user_id_to,

        'paycode_id' => '24pay-code_' . Str::random(16),
        'paycode_currency' => $request->paycode_currency,
        'paycode_amount' => $request->paycode_amount,
        'status' => $request->status,
      ];
      $paycode = Paycode::create($data);

      $paycode->user_from->UAH = $paycode->user_from->UAH - $request->paycode_amount;
      $paycode->user_from->save();

      return Response::json([
        'paycode' => $paycode
      ], 200);
    }

    public function storeAuthJson(Request $request)
    {
      $user_to = null;

      if($request->user_id_to != null)
      {
        $user = User::where('name', $request->user_id_to)->first();

        if(isset($user) && $user != null)
        {
          $user_to = $user->id;
        }
        else
        {
          return Response::json([
            'paycode' => 'user_not_found'
          ], 200);
        }

      }

      if(Auth::user()->UAH != null && Auth::user()->UAH >= $request->paycode_amount)
      {
        $data = [
          'user_id_from' => Auth::user()->id,
          'user_id_to' => $user_to,

          'paycode_id' => '24pay-code_' . Str::random(16),
          'paycode_currency' => $request->paycode_currency,
          'paycode_amount' => $request->paycode_amount,
          'status' => 0,
        ];
        $paycode = Paycode::create($data);
        Auth::user()->UAH = Auth::user()->UAH - $request->paycode_amount;
        Auth::user()->save();

        return Response::json([
          'paycode' => $paycode,
        ], 200);
      }
      else
      {
        return Response::json([
          'paycode' => 'user_no_money'
        ], 200);
      }

    }

    public function updateByIdJson(Request $request)
    {
      $data = [
        'user_id_from' => $request->user_id_from,
        'user_id_to' => $request->user_id_to,

        'paycode_currency' => $request->paycode_currency,
        'paycode_amount' => $request->paycode_amount,
        'status' => $request->status,
      ];

      $paycode = Paycode::findOrFail($request->id);

      $paycode->fill($data);
      $paycode->save();

      return Response::json([
        'paycode' => $paycode
      ], 200);
    }

    public function updateByCodeJson(Request $request)
    {
      $data = [
        'user_id_from' => $request->user_id_from,
        'user_id_to' => $request->user_id_to,

        'paycode_currency' => $request->paycode_currency,
        'paycode_amount' => $request->paycode_amount,
        'status' => $request->status,
      ];

      $paycode = Paycode::where('paycode_id', $request->paycode_id)->firstOrFail();

      $paycode->fill($data);
      $paycode->save();

      return Response::json([
        'paycode' => $paycode
      ], 200);
    }

    public function deleteByIdJson(Request $request)
    {

      $paycode = Paycode::findOrFail($request->id);
      $paycode->delete();

      return Response::json([], 200);
    }

    public function deleteByCodeJson(Request $request)
    {

      $paycode = Paycode::where('paycode_id', $request->paycode_id)->firstOrFail();
      $paycode->delete();

      return Response::json([], 200);
    }

    //Public methods
    public function index()
    {
      //$paycodes = Paycode::where($match)->whereIn('status', [0, 1])->orderBy('created_at', 'desc')->paginate(10);
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();
      $paycodes = DB::table('paycodes')
                  ->where(function($query) {
                      $query->where('user_id_from', Auth::user()->id)
                            ->whereIn('status', [0, 1]);
                  })
                  ->orWhere(function($query) {
                      $query->where('user_id_to', Auth::user()->id)
                            ->whereIn('status', [0, 1]);
                  })
                  ->orderBy('updated_at', 'desc')
                  ->paginate(10);

      return view('frontend.templates.cabinet.paycodes.index', compact('paycodes'),  ['trans'=>$transactions->groupBy('currency')]);
    }

    public function create()
    {
      $clients = User::all();
      $paycode_number = Str::random(16);


      while(true)
      {
        $paycode = Paycode::where('paycode_id', $paycode_number)->first();
        if(isset($paycode) && $paycode != null)
        {$paycode_number = Str::random(16);}
        else
        {break;}
      }


      return view('paycodes.create', compact('clients', 'paycode_number'));
    }

    public function edit($id)
    {
      $clients = User::all();
      $paycode = Paycode::findOrFail($id);
      return view('paycodes.edit', compact('paycode', 'clients'));
    }

    public function store(Request $request)
    {
      $user_to = null;

      if($request->user_id_to != null && $request->user_id_to != 0)
      {
        $user_to = $request->user_id_to;
      }

      $data = [
        'user_id_from' => $request->user_id_from,
        'user_id_to' => $user_to,

        'paycode_id' => Str::random(16),
        'paycode_currency' => $request->paycode_currency,
        'paycode_amount' => $request->paycode_amount,
        'status' => $request->status,
      ];
      $paycode = Paycode::create($data);

      return redirect()->route('paycode::index.get');
    }

    public function update(Request $request)
    {
      $data = [
        'user_id_from' => $request->user_id_from,
        'user_id_to' => $request->user_id_to,

        'paycode_currency' => $request->paycode_currency,
        'paycode_amount' => $request->paycode_amount,
        'status' => $request->status,
      ];

      $paycode = Paycode::findOrFail($request->id);

      $paycode->fill($data);
      $paycode->save();

      return redirect()->route('paycode::index.get');
    }

}
