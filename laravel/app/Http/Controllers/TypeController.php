<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        // Retrieve all runs from the database
        $types = Type::all();
        return response()->json($types);
    }
}
