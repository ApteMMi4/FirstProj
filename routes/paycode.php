<?php

//JSON API ROUTES
Route::post('/paycodes/json', ['App\Http\Controllers\PaycodeController', 'indexJson'])->name('paycode::index.json');
Route::post('/paycodes/json/show', ['App\Http\Controllers\PaycodeController', 'showJson'])->name('paycode::show.json');
Route::post('/paycodes/json/store', ['App\Http\Controllers\PaycodeController', 'storeJson'])->name('paycode::store.json');
Route::post('/paycodes/json/updateById', ['App\Http\Controllers\PaycodeController', 'updateByIdJson'])->name('paycode::updateById.json');
Route::post('/paycodes/json/updateByCode', ['App\Http\Controllers\PaycodeController', 'updateByCodeJson'])->name('paycode::updateByCode.json');
Route::post('/paycodes/json/deleteById', ['App\Http\Controllers\PaycodeController', 'deleteByIdJson'])->name('paycode::deleteById.json');
Route::post('/paycodes/json/deleteByCode', ['App\Http\Controllers\PaycodeController', 'deleteByCodeJson'])->name('paycode::deleteByCode.json');

//GET ROUTES FOR VIEWS
Route::get('/paycodes', ['App\Http\Controllers\PaycodeController', 'index'])->name('paycode::index.get');
Route::get('/paycodes/create', ['App\Http\Controllers\PaycodeController', 'create'])->name('paycode::create');
Route::post('/paycodes/store', ['App\Http\Controllers\PaycodeController', 'store'])->name('paycode::store');
Route::get('/paycodes/edit/{id}', ['App\Http\Controllers\PaycodeController', 'edit'])->name('paycode::edit');
Route::put('/paycodes/update', ['App\Http\Controllers\PaycodeController', 'update'])->name('paycode::update');
