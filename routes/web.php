<?php

use App\Http\Controllers\DonatedController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Fund;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $funds = Fund::all();
    return view('pages.home', compact('funds'));
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/user/fund/{id}', [FundController::class, 'showByUser']);
Route::get('/profile', [ProfileController::class, 'index'])->name('pages.profile')->middleware('auth');
Route::get('/fund/create', [FundController::class, 'create']);
Route::post('/fund/store', [FundController::class, 'store'])->name('fund.store')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/fund/{id}', [FundController::class, 'show'])->name('fund.show');

Route::post('/fund/{fundId}/donate', [DonatedController::class, 'store'])->name('donate.store')->middleware('auth');


Route::post('/transaction', [DonatedController::class, 'transaction'])->name('transaction');

