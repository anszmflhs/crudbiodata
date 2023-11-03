<?php

use App\Http\Controllers\BiodataController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BiodataController::class, 'index'])->name('biodata.index');
Route::get('/create', [BiodataController::class, 'create'])->name('biodata.create');
Route::post('/', [BiodataController::class, 'store'])->name('biodata.store');
Route::get('/{id}', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::patch('/{id}', [BiodataController::class, 'update'])->name('biodata.update');
Route::delete('/{id}', [BiodataController::class, 'destroy'])->name('biodata.delete');
