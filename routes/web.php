<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocationController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\RoomController;

use App\Http\Controllers\StateController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
});
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');

    Route::post('/login', 'postlogin')->name('postlogin');

    Route::post('/register', 'postregister')->name('postregister');
});

Route::prefix('/')->group(function () {
    Route::prefix('/')->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/list-ticket', 'listticket')->name('listticket');
            Route::get('/search', 'search')->name('search');
            Route::get('/ticket/{id}', 'ticket')->name('ticket');
            Route::get('/checkout', 'checkout')->name('checkout');
            Route::get('/book/{id_ticket}', 'book')->name('book');
            Route::post('/postbook', 'postbook')->name('postbook');

            Route::get('/delete/{id}', 'delete')->name('delete.ticket');
            Route::get('/join', 'join')->name('join');
            Route::get('/contact', 'contact')->name('contact');

            
        });
    });
});
Route::prefix('admin')->group(function () {
    Route::prefix('ticket')->group(function () {
        Route::controller(TicketController::class)->group(function () {
            Route::get('/list', 'list')->name('list.ticket');
            Route::get('/add', 'add')->name('add.ticket');
            Route::get('/edit/{id}', 'edit')->name('edit.ticket');
            Route::get('/delete/{id}', 'delete')->name('delete.ticket');
            Route::post('/add', 'postAdd')->name('postAdd.ticket');
            Route::post('/edit', 'postEdit')->name('postEdit.ticket');

            Route::get('/check/{id}', 'check')->name('check');
            Route::get('/change/{id}', 'change')->name('change');
            Route::get('/stateticket/{id}', 'stateticket')->name('stateticket');
            
        });
    });
    Route::prefix('user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list', 'list')->name('list.user');
            Route::get('/add', 'add')->name('add.user');
            Route::get('/edit/{id}', 'edit')->name('edit.user');
            Route::get('/delete/{id}', 'delete')->name('delete.user');
            Route::post('/add', 'postAdd')->name('postAdd.user');
            Route::post('/edit', 'postEdit')->name('postEdit.user');
            
        });
    });
    Route::prefix('room')->group(function () {
        Route::controller(RoomController::class)->group(function () {
            Route::get('/list', 'list')->name('list.room');
            Route::get('/add', 'add')->name('add.room');
            Route::get('/edit/{id}', 'edit')->name('edit.room');
            Route::get('/delete/{id}', 'delete')->name('delete.room');
            Route::post('/add', 'postAdd')->name('postAdd.room');
            Route::post('/edit', 'postEdit')->name('postEdit.room');
        });
    });    
});
