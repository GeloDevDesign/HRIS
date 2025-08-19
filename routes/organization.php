<?php


use App\Http\Controllers\Organization\DepartmentController;
use App\Http\Controllers\Organization\PositionController;

Route::middleware(['auth.admin'/* , 'XSS' */])
    ->name('organization.')
    ->prefix('organization')
    ->namespace('App\Http\Controllers\Organization')->group(function () {


//    DEPARTMENT ROUTES
        Route::resource('/department', DepartmentController::class);

//     POSITION ROUTES
        Route::resource('/position', PositionController::class);


    });
