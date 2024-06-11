<?php

use App\Http\Controllers\RunController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/runs', [RunController::class, 'index']);
Route::get('/locations', [LocationController::class, 'index']);
Route::get('/types', [TypeController::class, 'index']);

Route::middleware(['web', 'auth'])->get('/user', function () {
    return response()->json(['authenticated' => Auth::check(), 'user' => Auth::user()]);
});
