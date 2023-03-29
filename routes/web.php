<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MasterController;

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

Route::get('/', [ServiceController::class,'index']);
Route::get('/add-service', [ServiceController::class,'addService']);
Route::post('/storeService', [ServiceController::class, 'store']);
Route::get('/show-service', [ServiceController::class,'showService']);
Route::get('/service/edit/{service}', [ServiceController::class,'editService']);
Route::post('/update/service/{service}', [ServiceController::class,'storeUpdate']);
Route::get('/service/delete/{service}', [ServiceController::class, 'delete']);

Route::get('/', [MasterController::class,'index']);
Route::get('/add-master', [MasterController::class,'addMaster']);
Route::post('/storeMaster', [MasterController::class, 'store']);
Route::get('/master/delete/{master}', [MasterController::class, 'delete']);
Route::get('/master/edit/{master}', [MasterController::class,'editMaster']);
Route::post('/update/master/{master}', [MasterController::class,'storeUpdate']);
Route::get('/rate/{master}', [MasterController::class,'rateMaster']);
Route::get('/downrate/{master}', [MasterController::class,'downrateMaster']);
Route::get('/search', [MasterController::class, 'search']);
Route::post('/searchResults', [MasterController::class, 'searchResults']);

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
