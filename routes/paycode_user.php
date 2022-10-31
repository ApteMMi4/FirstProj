<?php

//JSON API ROUTES
Route::post('/paycodes/json', ['App\Http\Controllers\PaycodeUserController', 'indexJson'])->name('paycode::cabinet.index.json');

Route::post('/paycodes/json/show', ['App\Http\Controllers\PaycodeUserController', 'showJson'])->name('paycode::cabinet.show.json');
Route::post('/paycodes/json/showByCode', ['App\Http\Controllers\PaycodeUserController', 'showByCodeJson'])->name('paycode::cabinet.showByCode.json');
Route::post('/paycodes/json/storeAuthJson', ['App\Http\Controllers\PaycodeUserController', 'storeAuthJson'])->name('paycode::cabinet.storeAuth.json');

Route::post('/paycodes/json/store', ['App\Http\Controllers\PaycodeUserController', 'storeJson'])->name('paycode::cabinet.store.json');
Route::post('/paycodes/json/updateById', ['App\Http\Controllers\PaycodeUserController', 'updateByIdJson'])->name('paycode::cabinet.updateById.json');
Route::post('/paycodes/json/updateByCode', ['App\Http\Controllers\PaycodeUserController', 'updateByCodeJson'])->name('paycode::cabinet.updateByCode.json');
Route::post('/paycodes/json/deleteById', ['App\Http\Controllers\PaycodeUserController', 'deleteByIdJson'])->name('paycode::cabinet.deleteById.json');
Route::post('/paycodes/json/deleteByCode', ['App\Http\Controllers\PaycodeUserController', 'deleteByCodeJson'])->name('paycode::cabinet.deleteByCode.json');

//GET ROUTES FOR VIEWS
Route::get('/paycodes', ['App\Http\Controllers\PaycodeUserController', 'index'])->name('paycode::cabinet.index.get');
Route::get('/paycodes/create', ['App\Http\Controllers\PaycodeUserController', 'create'])->name('paycode::cabinet.create');
Route::post('/paycodes/store', ['App\Http\Controllers\PaycodeUserController', 'store'])->name('paycode::cabinet.store');
Route::get('/paycodes/edit/{id}', ['App\Http\Controllers\PaycodeUserController', 'edit'])->name('paycode::cabinet.edit');
Route::put('/paycodes/update', ['App\Http\Controllers\PaycodeUserController', 'update'])->name('paycode::cabinet.update');
