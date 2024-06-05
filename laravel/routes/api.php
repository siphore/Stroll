<?php

use App\Http\Controllers\RunController;
use Illuminate\Support\Facades\Route;

Route::get('/runs', [RunController::class, 'index']);
