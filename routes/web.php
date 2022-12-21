<?php

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

Route::get('/',['\App\Http\Controllers\PlanetPage','page'])->name('planet_list');
Route::get('/planet-ajax-data',['\App\Http\Controllers\PlanetPage','getPlanetData'])->name("planet-data");

Route::get('/logbooks',['\App\Http\Controllers\LogbookPage','list'])->name('logbook_list');
Route::get('/logbooks/create',['\App\Http\Controllers\LogbookPage','create'])->name('logbook_create');
Route::get('/logbooks-ajax-data',['\App\Http\Controllers\LogbookPage','getPlanetData'])->name("logbook_datatable");
