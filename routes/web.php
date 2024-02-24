<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Subject_Controller;
use App\Http\Controllers\SubjectUser_Controller;
use App\Http\Controllers\StudantController;
use App\Http\Middleware\CheckIsAdmin;

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
Route::prefix('admin')->middleware([CheckIsAdmin::class])->group(function () {
    // user Route

    Route::get('/user', [HomeController::class, 'showUser'])->name('user_home');
    Route::post('/user/create_user', [HomeController::class, 'create_user'])->name('create_user');
    Route::delete('/user/delete/{id}', [HomeController::class, 'destroy'])->name('delete_user');
    Route::put('/user/edit/{id}/', [HomeController::class, 'editUser'])->name('edit_user');
    // subject Route
    Route::get('/user_subject', [Subject_Controller::class, 'index'])->name('index_subject');
    Route::post('/user_subject/sort', [Subject_Controller::class, 'store'])->name('store_subject');
    Route::delete('/user_subject/delete/{id}', [Subject_Controller::class, 'destroy'])->name('delete_subject');
    Route::put('/user_subject/edit/{id}', [Subject_Controller::class, 'update'])->name('update_subject');
    // subject user Route
    Route::post('/user_subject/{subject_id}/add_user_for_subject', [SubjectUser_Controller::class, 'store'])->name('add_user_for_subject');
    Route::put('/user_subject/{subject_id}/{user_id}/update_user_mark', [SubjectUser_Controller::class, 'update'])->name('update_user_mark');
    Route::delete('/user_subject/{subject_id}/{user_id}/delete_user_mark', [SubjectUser_Controller::class, 'destroy'])->name('delete_user_mark');
});
Auth::routes(['verify' => true]);
// Route::get('/home', [HomeController::class, 'index'])->middleware('verified') ->name('home');
Route::middleware('auth')->group(function () {Route::get('/', [HomeController::class, 'index'])->name('home');});
Route::get('/waiting', function () {return view('studant.waiting');})->name('waiting');

//
