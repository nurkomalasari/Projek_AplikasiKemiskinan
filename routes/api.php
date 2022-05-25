<?php

use App\Http\Controllers\API\HasilSurveiController;
use App\Http\Controllers\API\OpsiJawabanController;
use App\Http\Controllers\API\PendudukController;
use App\Http\Controllers\API\PertanyaanController;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('status/all', [StatusController::class, 'all']);
Route::get('status', [StatusController::class, 'index']);

Route::get('penduduk', [PendudukController::class, 'all']);

Route::get('pertanyaan', [PertanyaanController::class, 'index']);
Route::get('pertanyaan/opsi', [PertanyaanController::class, 'pertanyaan']);

Route::post('pertanyaan/create', [PertanyaanController::class, 'create']);
Route::post('/pertanyaan/show/{id}', [PertanyaanController::class, 'show']);
Route::put('/pertanyaan/update/{id}', [PertanyaanController::class, 'update']);
Route::delete('/pertanyaan/delete/{id}', [PertanyaanController::class, 'delete']);

Route::get('opsiJawaban', [OpsiJawabanController::class, 'index']);
Route::post('opsiJawaban/create', [OpsiJawabanController::class, 'create']);
Route::post('/opsiJawaban/show/{id}', [OpsiJawabanController::class, 'show']);
Route::put('/opsiJawaban/update/{id}', [OpsiJawabanController::class, 'update']);
Route::delete('/opsiJawaban/delete/{id}', [OpsiJawabanController::class, 'delete']);

Route::get('hasilJawaban/tampil', [HasilSurveiController::class, 'tampil']);
Route::get('hasilJawaban', [HasilSurveiController::class, 'index']);
Route::post('hasilJawaban/create', [HasilSurveiController::class, 'create']);
Route::post('/hasilJawaban/show/{id}', [HasilSurveiController::class, 'show']);
Route::put('/hasilJawaban/update/{id}', [HasilSurveiController::class, 'update']);
Route::delete('/hasilJawaban/delete/{id}', [HasilSurveiController::class, 'delete']);
