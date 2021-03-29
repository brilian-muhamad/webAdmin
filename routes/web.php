<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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
    
    return view('index');
})-> name('index');


Route::get('/crud', [CrudController::class, 'index'])-> name('crud');
Route::get('/crud/tambahData', [CrudController::class, 'tambah'])-> name('crud.tambah');
Route::post('/crud/simpan', [CrudController::class, 'simpan'])-> name('crud.simpan');
Route::delete('/crud/hapus/{id}', [CrudController::class, 'hapus'])-> name('crud.hapus');