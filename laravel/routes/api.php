<?php

use App\Http\Controllers\RunController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/runs', [RunController::class, 'index']);
Route::get('/locations', [LocationController::class, 'index']);
