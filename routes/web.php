<?php

use App\Http\Controllers\RoleController;
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
    return view('layouts.master');
});
Route::prefix('/role')->group(function(){
    Route::get('/',[RoleController::class, 'index'])->name('role.index');
    Route::post('/',[RoleController::class, 'store'])->name('role.store');
    Route::get('/{id}',[RoleController::class, 'edit'])->name('role.edit');
    Route::put('/{id}',[RoleController::class, 'update'])->name('role.update');
    Route::delete('/{id}',[RoleController::class, 'destroy'])->name('role.destroy');
});
