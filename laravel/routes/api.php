<?php

use App\Http\Controllers\RunController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/runs', [RunController::class, 'index']);
Route::post('/runs', [RunController::class, 'store']);
Route::get('/runs/{id}', [RunController::class, 'show']);
Route::delete('/runs/{id}', [RunController::class, 'destroy']);
Route::get('/locations', [LocationController::class, 'index']);
Route::get('/types', [TypeController::class, 'index']);

Route::middleware(['web', 'auth'])->get('/user', function () {
    return response()->json(['authenticated' => Auth::check(), 'user' => Auth::user()]);
});
