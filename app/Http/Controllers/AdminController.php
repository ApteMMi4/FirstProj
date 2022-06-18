<?php

namespace App\Http\Controllers;

use App\Models\Conclusions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function vivod($conslusions_id)
    {

        $conslusions = Conclusions::find($conslusions_id);

        $request_data['request_data'] = [
            'withdraw_type' => 'UAH',
            'amount' => float($conslusions->sum),
            'gateway'=> 'default',
            'withdraw_to'=> '4111111111111111' //$conslusions->return
        ];
dd($request_data);

        $body_string_arr = [];

        foreach ($request_data['request_data'] as $key => $value) {
            $body_string_arr[] = $key . '=' . $value;
        }

        $body_string = http_build_query($request_data);

        $url = "https://api.kuna.io/v3/auth/withdraw";
        $nounce = round(microtime(true) * 1000);

        $signature = '/v3/auth/withdraw' . $nounce . $body_string;
        $kuna_secret_key = 'Vj12QCIzhk7kEwDZG8jcxnJc93BxNxfwhWyAosnh';
        $kuna_api_key = 'NAK2H7HgxqBmIzXY3RtYU3NnhaCwTRJBAlfMLOMY';
        $sig = hash_hmac('SHA384', $signature, $kuna_secret_key);


        $headers = [
            'kun-nonce: ' . $nounce,
            'kun-apikey: ' . $kuna_api_key,
            'kun-signature: ' . $sig,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body_string);


        $res = curl_exec($ch);
        curl_close($ch);

        $res_array = json_decode($res, TRUE);

        dd($res_array);
    }
}
