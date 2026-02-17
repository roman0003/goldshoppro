<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoldPriceController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Gold Price Routes
    Route::get('/gold-price', [GoldPriceController::class, 'index'])
        ->name('gold-price.index');

    Route::get('/gold-price/create', [GoldPriceController::class, 'create'])
        ->name('gold-price.create');

    Route::post('/gold-price', [GoldPriceController::class, 'store'])
        ->name('gold-price.store');

    // Billing Routes
    Route::get('/billing', [BillingController::class, 'index'])
        ->name('billing.index');

    Route::get('/billing/create', [BillingController::class, 'create'])
        ->name('billing.create');

    Route::post('/billing', [BillingController::class, 'store'])
        ->name('billing.store');

    Route::get('/billing/{id}/invoice', [BillingController::class ,'invoice'])
        ->name('billing.invoice');

    Route::get('/billing/{id}/download', [BillingController::class ,'downloadPdf'])
        ->name('billing.download');

    // Inventory Routes
    Route::get('/inventory', [InventoryController::class, 'index'])
        ->name('inventory.index');

    Route::get('/inventory/create', [InventoryController::class, 'create'])
        ->name('inventory.create');

    Route::post('/inventory', [InventoryController::class, 'store'])
        ->name('inventory.store');

        // Customers Route
    Route::get('/customers' ,[CustomerController::class,'index'])
        ->name('customers.index');

    Route::get('/customers/{customer}', 
    [CustomerController::class, 'show'])
    ->name('customers.show');

    //  Report Routes
    Route::prefix('reports')->group(function() {
    Route::get('/', [ReportController::class, 'index'])->name('reports.index'); // main reports page
    Route::get('/monthly', [ReportController::class, 'monthly'])->name('reports.monthly'); // monthly report

    
});

});

     

/*
|--------------------------------------------------------------------------
| Profile Routes (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    
});

    



/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
