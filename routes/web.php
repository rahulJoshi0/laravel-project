<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;

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
    return view('welcome');
});
route::get('counState',[CountryController::class,'getState'])->name('counState');
route::get('home',[HomeController::class,'index']);
route::resource("student",StudentController::class);
route::resource("test",TestController::class);
route::resource("country",CountryController::class);  
route::resource("state",StateController::class);
route::resource("city",CityController::class);

