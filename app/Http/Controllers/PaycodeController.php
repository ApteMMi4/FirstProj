<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Paycode;
use App\Models\User;

class PaycodeController extends Controller
{

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

      return Response::json([
        'paycode' => $paycode
      ], 200);
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

    public function index(Request $request)
    {
      $query = DB::table('paycodes');

      if(!isset($request->paycode_email_custom))
      {
        if(isset($request->paycode_search))
        {
          $query->where('paycode_id', $request->paycode_search);
        }
        if(isset($request->user_id_search) && $request->user_id_search != 0)
        {
          $query->where('user_id_from', $request->user_id_search);
        }
        if(isset($request->user_id_search2) && $request->user_id_search2 != 0)
        {
          $query->where('user_id_to', $request->user_id_search2);
        }

        $query->orderBy('paycodes.id', 'desc');
        $paycodes = $query->get();
        $paycodes = Paycode::whereIn('id', $paycodes->pluck('id'))->orderBy('created_at','desc')->paginate(10);
      }
      else
      {
        $query->orderBy('paycodes.id', 'desc');
        $paycodes = $query->get();

        $user_list_ids1 = $paycodes->pluck('user_id_from');
        $user_list_ids2 = $paycodes->pluck('user_id_to');
        $uIds = array();

        foreach($user_list_ids1 as $key=>$value)
        {
          if($value != null)
          {$uIds[$value] = $value;}
        }
        foreach($user_list_ids2 as $key=>$value)
        {
          if($value != null)
          {$uIds[$value] = $value;}
        }
        $users_ids = User::whereIn('id', $uIds)
          ->where('name','like','%'.$request->paycode_email_custom.'%')
          ->get()
          ->pluck('id');


        $paycodes = Paycode::whereIn('user_id_from', $users_ids)
          ->orWhereIn('user_id_to', $users_ids)
          ->orderBy('created_at','desc')
          ->paginate(10);
      }



      $clients = User::all();

      return view('paycodes.index', compact('paycodes', 'clients'));
    }

    public function create()
    {
      $clients = User::all();
      $paycode_number = '24pay-code_' . Str::random(16);


      while(true)
      {
        $paycode = Paycode::where('paycode_id', $paycode_number)->first();
        if(isset($paycode) && $paycode != null)
        {$paycode_number = '24pay-code_' . Str::random(16);}
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

        'paycode_id' => '24pay-code_' . Str::random(16),
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
