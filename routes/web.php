<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\MAPController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/product/add', [ProductController::class, 'product'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/manage', [ProductController::class, 'index'])->name('product.manage');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    

    Route::get('/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    ///// Dependent Dropdown //////////
    Route::get('dropdown' , [DropdownController::class, 'index'])->name('dropdowm');
    Route::get('api/fetch-state' , [DropdownController::class, 'state'])->name('state');
    Route::get('api/fetch-city' , [DropdownController::class, 'city'])->name('city');

    ///// MAP Location //////////
    Route::get('map/location' , [MAPController::class, 'index'])->name('map.location');
    Route::post('map/store' , [MAPController::class, 'store'])->name('map.store');
    Route::get('map/manage' , [MAPController::class, 'manage'])->name('map.manage');
    Route::get('map/edit/{id}' , [MAPController::class, 'edit'])->name('map.edit');
    Route::post('map/update/{id}' , [MAPController::class, 'update'])->name('map.update');
    Route::get('map/delete/{id}' , [MAPController::class, 'delete'])->name('map.delete');


    Route::get('location' , [MAPController::class, 'location'])->name('location');


});
