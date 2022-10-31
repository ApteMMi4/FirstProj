<?php

Route::get('/commissions', [App\Http\Controllers\Profile\UserController::class, 'commissions'])->name('commissions');


