<?php

use App\Http\Controllers\InterFace\FlightsController;
use App\Http\Controllers\InterFace\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/flights',[FlightsController::class,'flights'])->name('flights');

Route::get('/flights-search',[FlightsController::class,'flightsSearch'])->name('flights.search');

Route::get('/select-flight',[FlightsController::class,'selectFlights'])->name('flight.select');