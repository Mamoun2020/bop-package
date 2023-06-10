<?php

use Illuminate\Support\Facades\Route;
use Mamoun2020\Bop\Http\Controllers\BopController;

Route::get('api/bop/pay', [BopController::class, 'pay'])->name('bop.get-url');
