<?php

use App\Http\Controllers\Api\SaleController as ApiSaleController;
use App\Http\Controllers\Api\BranchProductController as ApiBranchProductController;
use App\Http\Controllers\AssignUserBranchController;
use App\Http\Controllers\BinnacleController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\BranchProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IncomeNoteController;
use App\Http\Controllers\OutputNoteController;
use App\Http\Controllers\MeasurementsUnitsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TransferNoteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::post('assign-user-branch/{user}', AssignUserBranchController::class)
    ->name('assign.user.branch');
    Route::get('binnacles',[BinnacleController::class, 'index'])->name('binnacles.index');
    Route::get('binnacles/{activity}/show',[BinnacleController::class, 'show'])->name('binnacles.show');
    Route::get('binnacles/list',[BinnacleController::class, 'list'])->name('binnacles.list');
    Route::get('categories/list',[CategoryController::class, 'list'])->name('categories.list');
    Route::get('customers/list',[CustomerController::class, 'list'])->name('customers.list');
    Route::get('branch-offices/list',[BranchOfficeController::class, 'list'])->name('branch-offices.list');
    Route::get('customers/list',[CustomerController::class, 'list'])->name('customers.list');
    Route::get('suppliers/list',[SupplierController::class, 'list'])->name('suppliers.list');
    Route::get('brands/list',[BrandController::class, 'list'])->name('brands.list');
    Route::get('units/list',[MeasurementsUnitsController::class, 'list'])->name('units.list');
    Route::get('products/list',[ProductController::class, 'list'])->name('products.list');
    Route::get('roles/list',[RolController::class, 'list'])->name('roles.list');
    Route::get('incomes/list-processed',[IncomeNoteController::class, 'processed_list'])->name('incomes.list-processed');
    Route::get('incomes/list-canceled',[IncomeNoteController::class, 'canceled_list'])->name('incomes.list-canceled');
    Route::get('incomes/list-entered',[IncomeNoteController::class, 'entered_list'])->name('incomes.list-entered');
    Route::post('incomes/status/{income}',[IncomeNoteController::class, 'entered_store'])->name('incomes.store-entered');
    Route::get('outputs/list-processed',[OutputNoteController::class, 'processed_list'])->name('outputs.list-processed');
    Route::get('outputs/list-canceled',[OutputNoteController::class, 'canceled_list'])->name('outputs.list-canceled');
    Route::get('outputs/list-delivered',[OutputNoteController::class, 'delivered_list'])->name('outputs.list-delivered');
    Route::post('outputs/status/{output}',[OutputNoteController::class, 'delivered_store'])->name('outputs.store-delivered');
    Route::get('sales/list',[SaleController::class, 'list'])->name('sales.list');
    Route::get('transfers/list',[TransferNoteController::class, 'list'])->name('transfers.list');
    Route::get('transfers/list-canceled',[TransferNoteController::class, 'canceled_list'])->name('transfers.list-canceled');
    Route::get('branch-products/list',[BranchProductController::class, 'list'])->name('branch-products.list');
    Route::get('pdf/{sale}',[SaleController::class, 'pdf']);
    Route::get('download/{sale}',[SaleController::class, 'download']);
    Route::get('incomes/pdf/{income}',[IncomeNoteController::class, 'pdf']);
    Route::get('incomes/download/{income}',[IncomeNoteController::class, 'download']);
    Route::get('outputs/pdf/{output}',[OutputNoteController::class, 'pdf']);
    Route::get('outputs/download/{output}',[OutputNoteController::class, 'download']);
    Route::get('transfers/pdf/{transfer}',[TransferNoteController::class, 'pdf']);
    Route::get('transfers/download/{transfer}',[TransferNoteController::class, 'download']);

    Route::resource('users', UserController::class);
    Route::resource('roles', RolController::class);
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('units', MeasurementsUnitsController::class);
    Route::resource('branch-offices', BranchOfficeController::class)->except(['show']);
    Route::resource('sales', SaleController::class)->except(['edit', 'update']);
    Route::resource('incomes', IncomeNoteController::class);
    Route::resource('outputs', OutputNoteController::class);
    Route::resource('transfers', TransferNoteController::class);
    Route::resource('branch-products', BranchProductController::class);

    //api
    Route::get('api/product/{product}', [ApiSaleController::class, 'getProduct'])->name('api.product');
    Route::get('api/customer/{user}', [ApiSaleController::class, 'getCustomer'])->name('api.customer');

    Route::get('api/branch-product/{id}', [ApiBranchProductController::class, 'getProductByBranch'])->name('api.branchproduct');
    Route::get('api/branch-product/product/{idproduct}/{idbranch}', [ApiBranchProductController::class, 'getProduct'])->name('api.branchproduct.product');
});

