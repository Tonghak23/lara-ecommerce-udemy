<?php

use App\Http\Controllers\Admin\Products\BrandController;
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
    return view('home.home');
});

Route::get('/brand/list',[BrandController::class, 'list'])->name('brand.list');
Route::get('/brand/form', [BrandController::class, 'form'])->name('brand.form');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('/brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');



Route::get('/dashboards', function () {
    return view('admin.index');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
