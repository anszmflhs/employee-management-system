<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
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
Route::prefix('/permission')->group(function(){
    Route::get('/',[PermissionController::class, 'index'])->name('permission.index');
    Route::post('/',[PermissionController::class, 'store'])->name('permission.store');
    Route::get('/{id}',[PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/{id}',[PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/{id}',[PermissionController::class, 'destroy'])->name('permission.destroy');
});
Route::prefix('/role-permission')->group(function(){
    Route::get('/',[RolePermissionController::class, 'index'])->name('role-permission.index');
    Route::post('/{id}',[RolePermissionController::class, 'store'])->name('role-permission.store');
    Route::get('/{id}',[RolePermissionController::class, 'create'])->name('role-permission.create');
});
