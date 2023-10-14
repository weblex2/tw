<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Http\Client\Response;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/peewees', function () {
    return view('peewees');
});

Route::get('/juniors2', function () {
    return view('juniors2');
});

Route::get('/juniors3', function () {
    return view('juniors3');
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


Route::middleware(['auth'])->controller(MainController::class)->group(function(){
    Route::controller(MainController::class)->group(function(){
        Route::get('uploadFile/{path?}', 'uploadFile')->name('uploadFile');
        Route::get('fileExplorer/{path?}', 'viewFiles')->name('viewFile');
        Route::post('storeFile', 'storeFile')->name('storeFile');
        Route::get('downloadFile/{file?}', 'downloadFile')->name('downloadFile');
        Route::get('deleteFile/{file_name}', 'deleteFile')->name('deleteFile');
        Route::get('dashboard', 'viewFiles')->name('dashboard');
        Route::post('createNewFolder', 'createFolder')->name('createFolder');
    });    
}); 



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */
});
