<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/login','login')->name('login');
        Route::post('/login','dologin')->name('dologin');
        Route::get('/register','register')->name('register');
        Route::post('/register','doregister')->name('doregister');
    });
});

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/home','index')->name('dashboard');
    });
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout','logout')->name('logout');
    });
    Route::controller(ClientController::class)->group(function(){
        Route::get('/clients/search','search')->name('clients.search');
        Route::get('/clients','index')->name('clients.index');
        Route::get('/clients/create','create')->name('clients.create');
        Route::post('/clients/store','store')->name('clients.store');
        Route::get('/client/{id}','show')->name('clients.show');
        Route::get('/client/{id}/edit','edit')->name('clients.edit');
        Route::post('/client/{id}/update','update')->name('clients.update');
        Route::post('/client/{id}/delete','destroy')->name('clients.destroy');
    });
    Route::controller(RoomController::class)->group(function(){
        Route::get('/rooms','index')->name('rooms.index');
        Route::get('/rooms/create','create')->name('rooms.create');
        Route::post('/rooms/store','store')->name('rooms.store');
        Route::get('/room/{id}','show')->name('rooms.show');
        Route::get('/room/{id}/edit','edit')->name('rooms.edit');
        Route::post('/room/{id}/update','update')->name('rooms.update');
        Route::post('/room/{id}/delete','destroy')->name('rooms.destroy');
    });
    Route::controller(BookingController::class)->group(function(){
        Route::get('/bookings','index')->name('bookings.index');
        Route::get('/bookings/create','create')->name('bookings.create');
        Route::post('/bookings/store','store')->name('bookings.store');
        Route::get('/booking/{id}','show')->name('bookings.show');
        Route::get('/booking/{id}/edit','edit')->name('bookings.edit');
        Route::post('/booking/{id}/update','update')->name('bookings.update');
        Route::post('/booking/{id}/delete','destroy')->name('bookings.destroy');
        Route::post('/booking/{id}/cancel','cancel')->name('bookings.cancel');
        Route::get('/bookings/trash','canceledBookings')->name('bookings.canceled');
    });
    Route::controller(UserController::class)->group(function(){
        Route::get('/user','index')->name('user.index');
    });
});


