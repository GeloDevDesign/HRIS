<?php

use App\Http\Controllers\Employee\BenefitController;

Route::middleware(['auth.admin'/* , 'XSS' */])
    ->name('employee.')
    ->prefix('employee')
    ->namespace('App\Http\Controllers\Employee')->group(function () {


//    BENEFIT ROUTES
        Route::resource('/benefits', BenefitController::class);




    });
