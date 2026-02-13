<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoldPriceController;
use App\Http\Controllers\BillingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gold-price',[GoldPriceController::class,'index']);
Route::get('/gold-price/create',[GoldPriceController::class,'create']);
Route::post('/gold-price',[GoldPriceController::class,'store']);

Route::get('/billing',[BillingController::class,'index']);
Route::get('/billing/create',[BillingController::class,'create']);
Route::post('/billing',[BillingController::class,'store']);


require __DIR__.'/auth.php';
