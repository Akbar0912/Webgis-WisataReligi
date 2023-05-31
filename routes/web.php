<?php

use App\Http\Controllers\TitikController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/home',[TitikController::class,'index']);
Route::get('/titik/json',[TitikController::class,'titik']);

Route::get('/data', function () {
    return view('data');
});
