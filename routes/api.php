<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('planets/largest',['\App\Http\Controllers\PlanetAPI','getLargestPlanet'])->name('get_largest_planet');
Route::get('planets/distribution/terrain',['\App\Http\Controllers\PlanetAPI','getTerrainDistribution'])->name('get_terrain_distribution');
Route::get('planets/distribution/resident',['\App\Http\Controllers\PlanetAPI','getResidentDistribution'])->name('get_resident_distribution');
Route::get('logbooks/',['\App\Http\Controllers\LogbookAPI','getLogbook'])->name('get_logbook');
Route::post('logbooks/',['\App\Http\Controllers\LogbookAPI','createLogbook'])->name('create_logbook');
