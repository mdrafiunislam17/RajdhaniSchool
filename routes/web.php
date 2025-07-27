<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/',[FrontController::class, 'index'])->name('front.index');
Route::get('/',[FrontController::class, 'index'])->name('front.index');
Route::get('/about/{title?}', [FrontController::class, 'aboutUs'])->name('aboutUs');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('sliders',SliderController::class);
Route::resource('abouts',AboutController::class);
Route::resource('teacher',TeacherController::class);
Route::get("settings", [SettingController::class, "index"])->name("setting.index");
Route::put("settings", [SettingController::class, "update"])->name("setting.update");

