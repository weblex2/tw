<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/peewees', function () {
    return view('peewees');
});

Route::get('/juniors', function () {
    return view('juniors');
});

Route::get('/seniors', function () {
    return view('seniors');
});

Route::get('/coaches', function () {
    return view('coaches');
});

Route::get('/training', function () {
    return view('training');
});

Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::controller(MainController::class)->group(function(){
    Route::post('sendMail', 'sendMail')->name('sendMail');
});

/*
Route::middleware(['auth'])->controller(MainController::class)->group(function(){
    Route::get('', 'index')->name('config.index');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
