<?php

use Illuminate\Support\Facades\Route;
use Mamoun2020\Bop\Http\Controllers\BopController;

Route::prefix('webhooks')
    ->withoutMiddleware('web')
    ->group(function () {
        Route::any('/bop', [BopController::class, 'callback'])
            ->name('bop.callback');
    });
