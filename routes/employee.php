<?php

use App\Http\Controllers\Employee\BenefitController;
use App\Http\Controllers\Employee\EmployeeController;

Route::middleware(['auth.admin'/* , 'XSS' */])
    ->name('employee.')
    ->prefix('employee')
    ->namespace('App\Http\Controllers\Employee')->group(function () {


        Route::resource('/benefits', BenefitController::class);
        Route::resource('/employees', EmployeeController::class);



    });
