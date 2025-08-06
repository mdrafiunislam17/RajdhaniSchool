<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\classController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentController;
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
Route::get('teachers',[FrontController::class,'teachers'])->name('teachers');
Route::get('teacher_details/{name?}',[FrontController::class, 'teacherdetails'])->name('teacherdetails');
Route::get('notices',[FrontController::class,'notices'])->name('notices');
Route::get('notice_details/{title?}',[FrontController::class,'noticeDetails'])->name('titleDetails');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('sliders',SliderController::class);
Route::resource('abouts',AboutController::class);
Route::resource('teacher',TeacherController::class);
Route::resource('gallery',GalleryController::class);
Route::resource('class',classController::class);
Route::resource('admission',AdmissionController::class);
Route::resource('student',StudentController::class);
Route::resource('notice',NoticeController::class);
Route::resource('result',ResultController::class);
Route::resource("blogs", BlogController::class);
Route::resource("events", EventController::class);
Route::get("settings", [SettingController::class, "index"])->name("setting.index");
Route::put("settings", [SettingController::class, "update"])->name("setting.update");

