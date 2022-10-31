<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cabinet Routes
|--------------------------------------------------------------------------
*/

Route::group([ 'as' => 'auth::'], function ()
{
  //Страница авторизации
  Route::get('/ulogin', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'login'])->name('ulogin');
  Route::post('/ulogin', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'loginStore'])->name('ulogin.store');

  //Страница регистрации
  Route::get('/usignup', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'signup'])->name('usignup');
  Route::post('/usignup', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'signupStore'])->name('usignup.store');

  //Страница восстановления доступа
  Route::get('/uforgot', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'forgot'])->name('uforgot');
  Route::post('/uforgot', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'forgotStore'])->name('uforgot.store');

  //Верификация Email
  Route::get('/uverify/{verify_code}', ['App\Http\Controllers\Frontend\AuthenticationFrontendController', 'verify'])->name('uverify');
});


//KYC
Route::get('cabinet/verify', [App\Http\Controllers\KycController::class, 'index'])->name('profile_verify')->middleware(['2fa']);
