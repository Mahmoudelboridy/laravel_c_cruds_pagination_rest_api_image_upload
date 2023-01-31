<?php

use App\Http\Controllers\crudcontroller;
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

Route::get('/', [crudcontroller::class, 'index']);
Route::post('/create', [crudcontroller::class, 'create'])->name('create');
Route::post('/delete/{id}', [crudcontroller::class, 'delete'])->name('delete');
Route::get('update/{id}', [crudcontroller::class, 'update']);
Route::post('update/{id}', [crudcontroller::class, 'update2'])->name('update');