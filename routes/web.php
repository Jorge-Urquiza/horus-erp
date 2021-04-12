<?php

use App\Http\Controllers\AsignarUsuarioSucursalController;
use App\Http\Controllers\BinnacleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MeasurementsUnitsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::post('usuario-sucursal', AsignarUsuarioSucursalController::class)->name('asignar.usuario.sucursal');
Route::get('binnacles',[BinnacleController::class, 'list'])->name('binnacles.index');
Route::get('binnacles/list',[BinnacleController::class, 'list'])->name('binnacles.list');
Route::get('categories/list',[CategoryController::class, 'list'])->name('categories.list');
Route::get('suppliers/list',[SupplierController::class, 'list'])->name('suppliers.list');
Route::get('customers/list',[CustomerController::class, 'list'])->name('customers.list');
Route::get('brands/list',[BrandController::class, 'list'])->name('brands.list');
Route::get('units/list',[MeasurementsUnitsController::class, 'list'])->name('units.list');

Route::resource('users', UserController::class);
Route::resource('roles', RolController::class);
Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('units', MeasurementsUnitsController::class);
