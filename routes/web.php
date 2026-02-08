<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BorrowController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\ReturnsController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\OfficerController;
use App\Http\Controllers\admin\AuthAdminController;


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
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthAdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthAdminController::class, 'login']);
    Route::get('/register', [AuthAdminController::class, 'showRegister'])->name('admin.register');
    Route::post('/register', [AuthAdminController::class, 'register']);
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::resource('borrows', BorrowController::class);
        Route::resource('students', StudentController::class);
        Route::resource('returns', ReturnsController::class);
        Route::resource('items', ItemController::class);
        Route::resource('officers', OfficerController::class);
    });
});
