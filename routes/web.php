<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchstoreController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\CurrancyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseTypeController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
})->middleware('auth');


Route::middleware(['auth'])->group(function(){
    // Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard')->middleware('verified');


    Route::resource('branch', BranchController::class);
    Route::resource('/user', UserController::class);
    Route::post('/user/{id}/toggle-role', [UserController::class ,'toggleRole'])->name('user.toggle-role');
    Route::post('user/toggle-status/{id}', [UserController::class ,'toggleStatus'])->name('user.toggle-status');

    Route::resource('/branch-store', BranchstoreController::class);
    Route::resource('/product-type', ProductTypeController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/customer',CustomerController::class);
    Route::resource('/admin',AdminController::class);
    Route::resource('/purchase_type',PurchaseTypeController::class);
    Route::resource('/container',ContainerController::class);
    Route::resource('/currency',CurrancyController::class);


    Route::get('/product',[AdminController::class,'product'])->name('admin.product');
    Route::get('/product/add',[AdminController::class,'add_product'])->name('admin.add.product');
    Route::get('/customer/add',[AdminController::class,'add_customer'])->name('admin.add.customer');
    Route::get('/customers',[AdminController::class,'customer'])->name('admin.customer');
    Route::get('/customers/sales',[AdminController::class,'customers_sales'])->name('admin.customers.sales');
    Route::get('/customer/sales/add',[AdminController::class,'add_customer_sale'])->name('admin.customer.add.sale');

    Route::get('/purchases',[AdminController::class,'purchases'])->name('admin.purchases');
    Route::get('/purchase/add',[AdminController::class,'add_purchase'])->name('admin.purchase.add');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
