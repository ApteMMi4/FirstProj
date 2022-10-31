<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//START
//Auth routes by D.Lomov 19/07/2022
require __DIR__.'/auth.php';
//END
//Footer--Menu
Route::get('/24pay-kode', [App\Http\Controllers\FooterController::class, 'payKode24'])->name('footerMenu_payKode24');
Route::get('/fees', [App\Http\Controllers\FooterController::class, 'fees'])->name('footerMenu_fees');
Route::get('/invoices', [App\Http\Controllers\FooterController::class, 'invoices'])->name('footerMenu_invoices');
Route::get('/FAQ', [App\Http\Controllers\FooterController::class, 'fAQ'])->name('footerMenu_fAQ');
Route::get('/blog', [App\Http\Controllers\FooterController::class, 'blog'])->name('footerMenu_blog');
Route::get('/partners', [App\Http\Controllers\FooterController::class, 'partners'])->name('footerMenu_partners');
Route::get('/agreement', [App\Http\Controllers\FooterController::class, 'agreement'])->name('footerMenu_agreement');
Route::get('/privacy-policy', [App\Http\Controllers\FooterController::class, 'privacyPolicy'])->name('footerMenu_privacyPolicy');
Route::get('/aml-kyc', [App\Http\Controllers\FooterController::class, 'amlKYCPolicy'])->name('footerMenu_amlKYCPolicy');
Route::get('/about-us', [App\Http\Controllers\FooterController::class, 'aboutUs'])->name('footerMenu_aboutUs');
Route::get('/contacts', [App\Http\Controllers\FooterController::class, 'contacts'])->name('footerMenu_contacts');
Route::get('/newses', [App\Http\Controllers\FooterController::class, 'newses'])->name('footerMenu_newses');


$currentDomain = config('app.currentDomain');
//$cabinetDomainSet = "cabinet.{$currentDomain}";

$adminDomainSet = "admin.{$currentDomain}";

//Route::group(array('domain' => $cabinetDomainSet,'prefix' => 'cabinet'), function()
Route::group(array('prefix' => 'cabinet'), function()
{

    Route::get('/', [App\Http\Controllers\Profile\UserController::class, 'index'])->name('profile_index')->middleware(['2fa']);
    Route::get('/me', [App\Http\Controllers\Profile\UserController::class, 'me'])->name('profile_me')->middleware(['2fa']);
    Route::put('/update', [App\Http\Controllers\Profile\UserController::class, 'update'])->name('profile_update');
    Route::put('/2fagoogle', [App\Http\Controllers\Profile\UserController::class, 'twoFaGoogle'])->name('profile_2fagoogle');
    Route::get('/transactions', [App\Http\Controllers\Profile\UserController::class, 'transactions'])->name('profile_transactions')->middleware(['2fa']);
    Route::get('/conclusions', [App\Http\Controllers\Profile\UserController::class, 'conclusions'])->name('profile_conclusions')->middleware(['2fa']);
    //Route::get('/dashboard', [App\Http\Controllers\Profile\UserController::class, 'dashboard'])->name('profile_dashboard')->middleware(['2fa']);
    Route::get('/dashboard', [App\Http\Controllers\Frontend\BalanceController::class, 'index'])->name('profile_dashboard')->middleware(['2fa', 'auth']);
    Route::get('/history', [App\Http\Controllers\Profile\UserController::class, 'history'])->name('profile_history')->middleware(['2fa']);
    Route::get('/withdrawal', [App\Http\Controllers\Profile\UserController::class, 'withdrawal'])->name('profile_withdrawal')->middleware(['2fa']);
    Route::post('/conclusionsCreate', [App\Http\Controllers\Profile\UserController::class, 'conclusionsStore'])->name('profile_conclusionsStore')->middleware(['2fa']);
    Route::get('/conclusionsPays', [App\Http\Controllers\Profile\UserController::class, 'conclusionsPays'])->name('profile_conclusionsPays')->middleware(['2fa']);
    Route::get('/payCode', [App\Http\Controllers\Profile\UserController::class, 'payCode'])->name('profile_payCode')->middleware(['2fa']);
    Route::get('/exchange', [App\Http\Controllers\Profile\UserController::class, 'exchange'])->name('profile_exchange')->middleware(['2fa']);
    //Route::get('/transfers', [App\Http\Controllers\Profile\UserController::class, 'transfers'])->name('profile_transfers')->middleware(['2fa']);
    //Route::get('/verify', [App\Http\Controllers\Profile\UserController::class, 'verify'])->name('profile_verify')->middleware(['2fa']);
    Route::get('/pcTransactions', [App\Http\Controllers\Profile\UserController::class, 'pcTransactions'])->name('profile_pcTransactions')->middleware(['2fa']);
    Route::get('/news', [App\Http\Controllers\Profile\UserController::class, 'news'])->name('profile_news')->middleware(['2fa']);

    //Балансы юзера
    //Route::get('/balances', [App\Http\Controllers\Frontend\BalanceController::class, 'index'])->name('balances.index')->middleware(['2fa', 'auth']);
    //Обмены
    Route::get('/exchanges', [App\Http\Controllers\Frontend\ExchangeController::class, 'index'])->name('exchanges.index')->middleware(['2fa', 'auth']);
    Route::post('/exchanges/store', [App\Http\Controllers\Frontend\ExchangeController::class, 'storeOrder'])->name('exchanges.store.order')->middleware(['2fa', 'auth']);
    Route::post('/exchanges/getDirection', [App\Http\Controllers\Frontend\ExchangeController::class, 'getDirection'])->name('exchanges.getDirection');

    //Переводы
    Route::get('/btransfers', [App\Http\Controllers\Backend\TransferBackendController::class, 'index'])->name('btransfers.index')->middleware(['2fa', 'auth']);
    Route::get('/transfers', [App\Http\Controllers\Frontend\TransferController::class, 'index'])->name('transfers.index')->middleware(['2fa', 'auth']);
    Route::post('/transfers/store', [App\Http\Controllers\Frontend\TransferController::class, 'storeOrder'])->name('transfers.store.order')->middleware(['2fa', 'auth']);
    Route::post('/transfers/getTransferCurrency', [App\Http\Controllers\Frontend\TransferController::class, 'getTransferCurrency'])->name('transfers.getTransferCurrency');


    Route::get('/pcAlert', [App\Http\Controllers\Profile\UserController::class, 'pcAlert'])->name('profile_pcAlert')->middleware(['2fa']);
    Route::get('/pcProtect', [App\Http\Controllers\Profile\UserController::class, 'pcProtect'])->name('profile_pcProtect')->middleware(['2fa']);
    Route::get('/pcApi', [App\Http\Controllers\Profile\UserController::class, 'pcApi'])->name('profile_pcApi')->middleware(['2fa']);
    Route::get('/changePass', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changePass'])->name('profile_changePass');



    Route::get('/sample', [App\Http\Controllers\Profile\UserController::class, 'sample'])->name('profile_sample')->middleware(['2fa']);
    Route::get('/discUser', [App\Http\Controllers\Profile\UserController::class, 'discUser'])->name('profile_discUser')->middleware(['2fa']);
    Route::get('/changePass', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changePass'])->name('profile_changePass');




    Route::resource('/news', App\Http\Controllers\Profile\NewsController::class)->except([
        'index'])->middleware(['2fa']);
    Route::get('/api-document', [App\Http\Controllers\BaseController::class, 'apiDocument'])->name('apiDocument')->middleware(['2fa']);

    Route::get('/invoice', [App\Http\Controllers\Profile\UserController::class, 'invoice'])->name('profile_invoice')->middleware(['2fa']);
    Route::post('/invoice', [App\Http\Controllers\Profile\UserController::class, 'arbitraryPaymentSave'])->name('profile_arbitraryPaymentSave');

    require __DIR__.'/paycode_user.php';
});

//Route::group(array('domain' => $adminDomainSet), function()
Route::group(array('prefix' => 'admin'), function()
{

    Route::get('/adminMe', [App\Http\Controllers\Profile\UserController::class, 'adminMe'])->name('profile_adminMe')->middleware(['2fa']);
    Route::get('/currencies', [App\Http\Controllers\Profile\UserController::class, 'currencies'])->name('profile_currencies');
    Route::get('/affil-program', [App\Http\Controllers\Profile\UserController::class, 'affilProgram'])->name('profile_affilProgram');
    Route::get('/discount', [App\Http\Controllers\Profile\UserController::class, 'discount'])->name('profile_discount');
    Route::get('/fast-output', [App\Http\Controllers\Profile\UserController::class, 'fastOutput'])->name('profile_fastOutput');
    Route::get('/user-page', [App\Http\Controllers\Profile\UserController::class, 'userPage'])->name('profile_userPage');
    Route::post('/status-update', [App\Http\Controllers\Profile\UserController::class, 'statusTransactionUpdate'])->name('profile_statusUpdate');
    Route::resource('/users', App\Http\Controllers\Profile\ProfileController::class);
    Route::post('/vivod/{conslusions_id}', [\App\Http\Controllers\AdminController::class, 'vivod'])->name('profile_vivod');
    Route::get('/conclusions', [App\Http\Controllers\Profile\UserController::class, 'conclusions'])->name('profile_conclusions')->middleware(['2fa']);

    Route::get('/news/{first}/{page}/{sort}/{param}', [App\Http\Controllers\Profile\NewsController::class, 'index'])->name('news.index');

    //Модуль управления валютами для Бинанса
    Route::resource('/binance_currencies', App\Http\Controllers\Backend\CurrencyController::class)->except([
      'show'
    ]);

    //Обновление курсов с бинанса
    Route::resource('/binance_courses', App\Http\Controllers\Backend\BinanceController::class)->except([
      'show'
    ]);

    //Обновление курсов с бинанса
    Route::resource('/exchange_directions', App\Http\Controllers\Backend\ExchangeDirectionController::class)->except([
      'show'
    ])->middleware(['auth']);

    //Заявки на обмен
    Route::resource('/exchange_orders', App\Http\Controllers\Backend\ExchangeController::class)->except([
      'show'
    ]);
    Route::get('/exchange_orders/set_status/{id}/{status}', [App\Http\Controllers\Backend\ExchangeController::class, 'setStatus'])->name('exchanges.setStatus');

    require __DIR__.'/paycode.php';
});
//Route::resource('admin/users', App\Http\Controllers\Profile\ProfileController::class);

Route::get('/', [App\Http\Controllers\BaseController::class, 'index'])->name('index');

Route::get('/o-nas', [App\Http\Controllers\BaseController::class, 'yourSelf'])->name('yourself');

Route::get('/contact', [App\Http\Controllers\BaseController::class, 'contact'])->name('contact');




Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete-registration');

Route::post('/2fa', function () {
    return redirect('/home');
})->name('2fa')->middleware('2fa');

Route::get('/withdrawalHistory', [App\Http\Controllers\Profile\UserController::class, 'withdrawalHistory'])->name('profile_withdrawalHistory')->middleware(['2fa']);

Route::get('/form/{payment}/{hash}', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::post('/pay-cul', [\App\Http\Controllers\OrderController::class, 'payCul']);
Route::get('/table-excel', [\App\Http\Controllers\Profile\TableExcelController::class, 'index']);
Route::post('/table', [\App\Http\Controllers\Profile\TableExcelController::class, 'store'])->name('table_save_complete');

Route::get('/notPass/{transaction_hash}', [\App\Http\Controllers\OrderController::class, 'fail'])->name('order_fail');  //fail
Route::get('/turnedGreat/{transaction_hash}', [\App\Http\Controllers\OrderController::class, 'success'])->name('order_success');  //success
Route::get('/returnedPass/{transaction_hash}', [\App\Http\Controllers\OrderController::class, 'callback']);  //callback
Route::get('/passBlocked/{transaction_hash}', [\App\Http\Controllers\OrderController::class, 'block'])->name('order_block');  //block
//Route::get('/universal/{transaction_hash}', [\App\Http\Controllers\OrderController::class, 'universal'])->name('universal');
