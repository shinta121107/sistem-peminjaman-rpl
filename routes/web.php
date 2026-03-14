<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BorrowController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\ReturnsController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\OfficerController;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\student\RegisterController;
use App\Http\Controllers\student\LoginController;
use App\Http\Controllers\student\BorrowController as StudentBorrowController;


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


Route::prefix('student')->name('student.')->group(function () {

    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.process');

    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.process');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('student')->group(function () {
        Route::get('dashboard', function () {
            return view('student.dashboard');
        })->name('dashboard');
        Route::get('borrows', [StudentBorrowController::class, 'index'])->name('borrows.index');
        /* This route is defining a GET route for displaying a specific borrow record for a student.
        When a user accesses the URL `/student/borrows/{borrow}`, it will invoke the `show` method
        of the `StudentBorrowController` class. The `name('borrows.show')` method is assigning a
        name to this route, which can be used to generate URLs or redirects to this specific route
        in the application. */
        Route::get('borrows/{borrow}', [StudentBorrowController::class, 'show'])->name('borrows.show');
    });
});
