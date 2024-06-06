<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


 
Route::get('/list', [UserController::class, 'show']);

Route::get('/list-detail/{id}', [UserController::class, 'detail']);

Route::post('/send', [UserController::class, 'send'])->name('telegram.send');;
