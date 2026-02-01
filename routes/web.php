<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OfficerController;


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

Route::resource('borrows', BorrowController::class);
Route::resource('students', StudentController::class);
Route::resource('returns', ReturnsController::class);
Route::resource('items', ItemController::class);
Route::resource('officers', OfficerController::class);
