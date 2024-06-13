<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\Request;
use App\Http\Requests\RunRequest;

class RunController extends Controller
{
    public function index()
    {
        // Retrieve all runs from the database
        $runs = Run::all();
        return response()->json($runs);
    }

    public function create()
    {
        // Return the form view
        return view('runs.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:65',
            'descr' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|numeric',
            'distance' => 'required|numeric',
            'level_difficulty' => 'required|string|in:Facile,Moyen,Difficile',
            'departure' => 'required|string',
            'arrival' => 'required|string',
            'season' => 'nullable|array',
            'public' => 'nullable|array',
            'accessibility' => 'nullable|array',
            'equipment' => 'nullable|array',
            'district' => 'required|string|in:Aigle,Broye-Vully,Gros-de-Vaud,Jura-Nord vaudois,Lausanne,Lavaux-Oron,Morges,Nyon,Ouest Lausanne,Riviera-Pays-d_Enhaut',
            'theme' => 'nullable|array',
            'family' => 'boolean',
            'school' => 'boolean',
            'senior' => 'boolean',
            'handicap' => 'boolean',
            'dogs' => 'boolean',
            'parkings' => 'boolean',
            'public_transport' => 'boolean',
            'mobility' => 'boolean',
            'scroller' => 'boolean',
            'table_picnic' => 'boolean',
            'bench' => 'boolean',
            'wc' => 'boolean',
            'fireplace' => 'boolean',
            'playground' => 'boolean',
            'rating' => 'nullable|numeric',
            'location_id' => 'required|integer|exists:locations,id',
            'type_id' => 'required|integer|exists:types,id',
        ]);

        // Handle file upload if any
        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
        }

        // Create a new Run instance
        $run = new Run;
        $run->name = $validatedData['name'];
        $run->descr = $validatedData['descr'];
        $run->img = $imagePath;
        $run->duration = $validatedData['duration'];
        $run->distance = $validatedData['distance'];
        $run->level_difficulty = $validatedData['level_difficulty'];
        $run->departure = $validatedData['departure'];
        $run->arrival = $validatedData['arrival'];
        $run->season = json_encode($validatedData['season'] ?? []);
        $run->public = json_encode($validatedData['public'] ?? []);
        $run->accessibility = json_encode($validatedData['accessibility'] ?? []);
        $run->equipment = json_encode($validatedData['equipment'] ?? []);
        $run->theme = json_encode($validatedData['theme'] ?? []);
        $run->district = $validatedData['district'];
        $run->family = $validatedData['family'] ?? false;
        $run->school = $validatedData['school'] ?? false;
        $run->senior = $validatedData['senior'] ?? false;
        $run->handicap = $validatedData['handicap'] ?? false;
        $run->dogs = $validatedData['dogs'] ?? false;
        $run->parkings = $validatedData['parkings'] ?? false;
        $run->public_transport = $validatedData['public_transport'] ?? false;
        $run->mobility = $validatedData['mobility'] ?? false;
        $run->scroller = $validatedData['scroller'] ?? false;
        $run->table_picnic = $validatedData['table_picnic'] ?? false;
        $run->bench = $validatedData['bench'] ?? false;
        $run->wc = $validatedData['wc'] ?? false;
        $run->fireplace = $validatedData['fireplace'] ?? false;
        $run->playground = $validatedData['playground'] ?? false;
        $run->rating = $validatedData['rating'] ?? 0;
        $run->location_id = $validatedData['location_id'];
        $run->type_id = $validatedData['type_id'];

        // Save the run to the database
        $run->save();

        // Return a response
        return response()->json(['success' => true, 'data' => $run], 201);
    }

    public function destroy($id)
    {
        $run = Run::findOrFail($id);
        $run->delete();
        return response()->json(['message' => 'Sentier supprimé avec succès!']);
    }

    public function show($id)
    {
        $run = Run::findOrFail($id);
        return response()->json($run);
    }

}
