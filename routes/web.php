<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\LoginController;
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
    return redirect('/login');
});

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::put('/inventory/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
Route::post('inventory/import', [InventoryController::class, 'import'])->name('inventory.import');
Route::get('/inventory/inactive', [InventoryController::class, 'inactive'])->name('inventory.inactive');
Route::put('/inventory/{id}/activate', [InventoryController::class, 'activate'])->name('inventory.activate');
Route::get('/inventory/search', [InventoryController::class,'search'])->name('inventory.search');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Log::info('Your log message here.');





Auth::routes();

Route::get('/home',  [InventoryController::class, 'index'])->name('inventory.index');


