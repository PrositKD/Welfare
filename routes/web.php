<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApartmentCategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    //For Profile Update
    Route::get('/profile', [ProfileController::class, 'profilePageShow'])->name('profile_page_show');
    Route::post('/profile-update/{id:id}', [ProfileController::class, 'profileUpdate'])->name('profile.update');


    // Route for Staff
    Route::group(['prefix' => 'staff', 'middleware' => 'auth', 'as' => 'staff.'], function () {
        Route::controller(StaffController::class)->group(function () {
            Route::get('/list', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/status-change/{id}', 'statusChange')->name('status_change');
            Route::post('/registration-approve/{id}', 'approve')->name('approve');
        });
    });
    // Route for Building
    Route::group(['prefix' => 'building', 'middleware' => 'auth', 'as' => 'building.'], function () {
        Route::controller(BuildingController::class)->group(function () {
            Route::get('/list', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-change/{id}', 'statusChange')->name('status_change');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
    });
    // Route for Apartment
    Route::group(['prefix' => 'apartment', 'middleware' => 'auth', 'as' => 'apartment.'], function () {
        Route::controller(ApartmentController::class)->group(function () {
            Route::get('/list', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/status-change/{id}', 'statusChange')->name('status_change');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            
        });
    });

    Route::group(['prefix' => 'apartment-category', 'middleware' => 'auth', 'as' => 'apartment-category.'], function () {
        Route::controller(ApartmentCategoryController::class)->group(function () {
            Route::get('/list', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
    });
    

    Route::post('/employee/collect', [EmployeeController::class, 'collectPayment'])->name('employee.collectPayment');

});
