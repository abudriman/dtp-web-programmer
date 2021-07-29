<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FormController;
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
    return view('index');
});

Route::resource('karyawan', KaryawanController::class);
Route::resource('pendidikan', PendidikanController::class);
Route::resource('experience', ExperienceController::class);
Route::post('/form-submit', [FormController::class, 'submit']);