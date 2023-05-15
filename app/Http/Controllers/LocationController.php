<?php 

// app/Http/Controllers/LocationController.php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function logLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        // Save the user's location to the database using the Tracking model.
        Tracking::create([
            'lat' => $request->latitude,
            'lon' => $request->longitude,
            'user_id' => $request->user_id,
            'action' => 'periodic',
            'team_id' => optional(User::find($request->user_id))->team_id,
        ]);

        return response()->json(['message' => 'Location logged successfully']);
    }
}