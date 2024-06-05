<?php

use App\Http\Controllers\RunController;

Route::get('/runs', [RunController::class, 'index']);