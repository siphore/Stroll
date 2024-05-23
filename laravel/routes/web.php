<?php

use Illuminate\Support\Facades\Route;

Route::get('/map', [App\Http\Controllers\MapController::class, 'index']);