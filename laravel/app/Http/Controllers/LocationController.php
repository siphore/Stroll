<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // Retrieve all runs from the database
        $locations = Location::all();
        return response()->json($locations);
    }
}
