<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Office\OfficeController;
use App\Http\Controllers\Office\LevelController;
use App\Http\Controllers\Office\ServicesController;
use App\Http\Controllers\Office\SectionController;
use App\Http\Controllers\Office\DivisionsController;
use App\Http\Controllers\Documents\LogsController;
use App\Http\Controllers\Documents\ActionsController;
use App\Http\Controllers\Documents\DocumentsController;
use App\Http\Controllers\Documents\WatchesController;

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
// Auth //
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Office Route //
Route::post('newoffice', [OfficeController::class, 'register']);
Route::post('level', [LevelController::class, 'register']);
Route::get('levels', [LevelController::class, 'getlevels']);
Route::get('userperoffice/{office_id}', [OfficeController::class, 'getUser']);
Route::get('officeperlevel/{level_id}', [LevelController::class, 'getOffice']);
Route::post('services', [ServicesController::class, 'register']);
Route::get('services/{level_id}', [ServicesController::class, 'getservices']);
//Route::post('division', [DivisionController::class, 'register']);
//Route::get('divisions', [DivisionController::class, 'getdivisions']);
//Route::get('divisiondocuments', [DivisionController::class, 'divisiondocuments']);
//Route::get('divisions/{level_id}', [DivisionController::class, 'getleveldivisions']);
Route::post('section', [SectionController::class, 'register']);
Route::get('sections/{level_id}', [SectionController::class, 'getlevelsections']);



Route::get('track/{id}', [LogsController::class, 'track']);

Route::apiResource('logs', LogsController::class)->only(['show','store']);

Route::apiResource('actions', ActionsController::class)->only(['show','store','edit', 'update']);

Route::apiResource('divisions', DivisionsController::class)->only(['show','store']);

Route::apiResource('watches', WatchesController::class)->only(['show','store','destroy']);

Route::apiResource('documents', DocumentsController::class)->only(['show','store','edit', 'index', 'destroy', 'update']);

