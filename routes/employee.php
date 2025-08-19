<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ActivityLogController;

Route::middleware(['auth.admin'/* , 'XSS' */])
    ->name('admin.')
    ->prefix('admin')
    ->namespace('App\Http\Controllers\Admin')->group(function () {

        Route::get('/', 'DashboardController@index')->name('index');

        Route::group(['prefix' => 'backups'], function () {
            Route::get('/', 'BackupController@index')->name('backups.index');
            Route::get('download-backup', 'BackupController@downloadBackup')->name('backups.download-backup');
            Route::delete('delete-backup', 'BackupController@deleteBackup')->name('backups.delete-backup');
            Route::get('generate-db-backup', 'BackupController@generateDatabaseBackup')->name('backups.generate-db-backup');
            Route::get('generate-full-backup', 'BackupController@generateFullBackup')->name('backups.generate-full-backup');
        });

        Route::get('audit-logs', [ActivityLogController::class, 'index'])->name('audit-logs.index');

        Route::get('users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password')->middleware('auth.adminonly');
        Route::put('users/update-password/{user}', [UserController::class, 'updatePassword'])->name('users.update-password')->middleware('auth.adminonly');





    });
