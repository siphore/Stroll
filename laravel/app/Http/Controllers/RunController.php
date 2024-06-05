<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\Request;

class RunController extends Controller
{
    public function index()
    {
        // Retrieve all runs from the database
        $runs = Run::all();
        return response()->json($runs);
    }
}
