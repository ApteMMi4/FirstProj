<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class KycController extends Controller
{
  public function index()
  {
    return view('frontend.templates.cabinet.kyc.index');
  }

}
