<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hey',function(){
    echo "Ola Mundo!";
});

Route::get('/series', [SeriesController::class, 'index']);

Route::get('/series/create', [SeriesController::class, 'create'])->name('criar_serie');

Route::post('/series/create', [SeriesController::class, 'store']);

Route::delete('/series/{id}',[SeriesController::class, 'remove']);

Route::get('/series/{serieid}/temporadas',[TemporadasController::class,'index']);