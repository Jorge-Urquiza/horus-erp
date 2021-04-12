<?php

use App\Http\Controllers\AsignarUsuarioSucursalController;
use App\Http\Controllers\BinnacleController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MeasurementsUnitsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::post('usuario-sucursal', AsignarUsuarioSucursalController::class)->name('asignar.usuario.sucursal');
    Route::get('binnacles',[BinnacleController::class, 'index'])->name('binnacles.index');
    Route::get('binnacles/list',[BinnacleController::class, 'list'])->name('binnacles.list');
    Route::get('categories/list',[CategoryController::class, 'list'])->name('categories.list');
    Route::get('customers/list',[CustomerController::class, 'list'])->name('customers.list');
    Route::get('branch-offices/list',[BranchOfficeController::class, 'list'])->name('branch-offices.list');
    Route::get('customers/list',[CustomerController::class, 'list'])->name('customers.list');
    Route::get('suppliers/list',[SupplierController::class, 'list'])->name('suppliers.list');
    Route::get('brands/list',[BrandController::class, 'list'])->name('brands.list');
    Route::get('units/list',[MeasurementsUnitsController::class, 'list'])->name('units.list');
    Route::get('products/list',[ProductController::class, 'list'])->name('products.list');

    Route::resource('users', UserController::class);
    Route::resource('roles', RolController::class);
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('units', MeasurementsUnitsController::class);
    Route::resource('branch-offices', BranchOfficeController::class)->except(['show']);
    Route::resource('sales', SaleController::class);
});

