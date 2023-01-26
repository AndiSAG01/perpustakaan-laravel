<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;

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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');

        // category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    // book
    Route::get('/book', [BookController::class, 'index']);
    Route::post('/book', [BookController::class, 'store']);
    Route::get('/book/{id}/show', [BookController::class, 'show']);
    Route::get('/book/{id}/edit', [BookController::class, 'edit']);
    Route::put('/book/{id}', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);

    // user
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/show', [UserController::class, 'show']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::post('/user/excel', [UserController::class, 'import']);

    // late
    Route::get('/late', [LateController::class, 'index']); 
    Route::post('/late', [LateController::class, 'store']); 
    Route::put('/late/{id}', [LateController::class, 'update']); 

    // transaction 
    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::post('/transaction', [TransactionController::class, 'store']);
    Route::get('/transaction/{id}/show', [TransactionController::class, 'show']);
    Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit']);
    Route::put('/transaction/{id}/', [TransactionController::class, 'update']);
    Route::delete('/transaction/{id}/', [TransactionController::class, 'destroy']);

    // income
    Route::get('/income', [IncomeController::class, 'index']);
    Route::post('/income', [IncomeController::class, 'store']);
    Route::get('/income/{id}/edit', [IncomeController::class, 'edit']);
    Route::put('/income/{id}', [IncomeController::class, 'update']);
    Route::delete('/income/{id}', [IncomeController::class, 'destroy']);

    // report
    Route::get('/report/users', [ReportController::class, 'users']);
    Route::get('/report/books', [ReportController::class, 'books']);
    Route::get('/report/transactions', [ReportController::class, 'transactions']);
    Route::get('/report/incomes', [ReportController::class, 'incomes']);

     // category
    Route::get('/letter', [LetterController::class, 'index']);
    Route::post('/letter', [LetterController::class, 'store']);
    Route::delete('/letter/{id}', [LetterController::class, 'destroy']);
    Route::get('/letter/{id}/print', [LetterController::class, 'print']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MemberController::class, 'index']);
    Route::get('/history', [MemberController::class, 'history']);
    Route::get('/profile/{id}/show', [MemberController::class, 'show']);
    Route::get('/profile/{id}/edit', [MemberController::class, 'edit']);
    Route::put('/profile/{id}', [MemberController::class, 'update']);
    Route::get('/print', [MemberController::class, 'print']);

});

Route::get('/presensi', [GuestController::class, 'index']);
Route::post('/presensi', [GuestController::class, 'store']);
Route::get('/idcard', [GuestController::class, 'idcard']);
Route::post('/search', [GuestController::class, 'search']);
Route::view('/', 'test');
Route::view('/find', 'findBook');
Route::post('/findBook', [GuestController::class, 'findBook']);
