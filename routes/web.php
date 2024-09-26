<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\CalendarTasksController;
use App\Http\Controllers\AdminController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('newsCategory', NewsCategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('tasks', TasksController::class);
    Route::resource('calendar', CalendarTasksController::class);
});

 Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'editProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class, 'storeProfile'])->name('store.profile');
    Route::view('/change/password','admin.profile.admin_change_password')->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password'); 
});


