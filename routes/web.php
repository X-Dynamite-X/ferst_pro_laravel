<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Subject_Controller;



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





Route::prefix('studant')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});




Route::prefix('admin')->group(function () {
    Route::get('/user_subject', [Subject_Controller::class, 'index'])->name('index_subject');
    Route::post('/user_subject/sort',[Subject_Controller::class, 'store'])->name('store_subject');
    Route::delete('/user_subject/delete/{id}', [Subject_Controller::class,'destroy'])->name('delete_subject');
    Route::put('/user_subject/edit/{id}',[Subject_Controller::class, 'update'])->name('update_subject');

Route::get('/user', [HomeController::class, 'showUser'])->name('user_home');

    Route::post('/subjects/{subject}/addUser', [Subject_Controller::class, 'addUserToSubject'])->name('subjects_addUser');
});



Auth::routes(['verify'=>true]);

// Route::get('/home', [HomeController::class, 'index'])->middleware('verified') ->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
