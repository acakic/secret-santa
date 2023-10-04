<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UsersController;
var_dump('test2');
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
//Route::get('/about', 'PagesController@about');
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/candidates', [PagesController::class, 'candidates']);
Route::get('/login', [CustomAuthController::class, 'login']);
Route::get('/register', [CustomAuthController::class, 'register']);
Route::get('/imsantato', [UsersController::class, 'imSantaTo']);

Route::post('/logindata', [CustomAuthController::class, 'logindata']);
Route::post('/registerdata', [CustomAuthController::class, 'store']);
Route::post('/logout', [CustomAuthController::class, 'logout']);
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//show all users
Route::get('/candidates', [UsersController::class, 'showAllUsers']);

Route::post('/getMySanta', [UsersController::class, 'getMySanta']);






