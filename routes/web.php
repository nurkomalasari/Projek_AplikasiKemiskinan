<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HasilSurveyController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\VillageController;
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
    return view('coba');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('penduduk/index', [PendudukController::class, 'index']);
Route::get('penduduk/read', [PendudukController::class, 'read']);
Route::get('penduduk/create', [PendudukController::class, 'create']);
Route::get('penduduk/store', [PendudukController::class, 'store']);
Route::get('penduduk/show/{id}', [PendudukController::class, 'show']);
Route::get('penduduk/update/{id}', [PendudukController::class, 'update']);
Route::get('penduduk/destroy/{id}', [PendudukController::class, 'destroy']);

Route::get('status/index', [StatusController::class, 'index']);
Route::get('status/read', [StatusController::class, 'read']);
Route::get('status/create', [StatusController::class, 'create']);
Route::get('status/store', [StatusController::class, 'store']);
Route::get('status/show/{id}', [StatusController::class, 'show']);
Route::get('status/update/{id}', [StatusController::class, 'update']);
Route::get('status/destroy/{id}', [StatusController::class, 'destroy']);

Route::get('store/index', [StoreController::class, 'index']);
Route::get('store/create', [StoreController::class, 'create']);
Route::get('store/read', [StoreController::class, 'read']);


Route::get('hasil/index', [HasilSurveyController::class, 'index']);
Route::get('hasil/read', [HasilSurveyController::class, 'read']);

Route::get('pertanyaan/read', [HasilSurveyController::class, 'pertanyaan']);




Route::get('/provinces', [ProvinceController::class, 'select'])->name('provinces.select');
Route::get('/regencies', [RegencyController::class, 'select'])->name('regencies.select');
Route::get('/districts', [DistrictController::class, 'select'])->name('districts.select');
Route::get('/villages', [VillageController::class, 'select'])->name('villages.select');
