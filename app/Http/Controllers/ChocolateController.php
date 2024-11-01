<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chocolate;

class ChocolateController extends Controller
{
    // Display the homepage
    public function index()
    {
        return view('welcome');
    }

    // Display the list of chocolates
    public function showChocolates()
    {
        $chocolates = Chocolate::all();
        return view('chocolates.index', compact('chocolates'));
    }

    // Fetch details of a specific chocolate by ID and return as JSON
    public function getChocolateDetails($id)
    {
        // Find the chocolate by ID
        $chocolate = Chocolate::find($id);

        // Check if the chocolate exists and return its details
        if ($chocolate) {
            return response()->json([
                'name' => $chocolate->name,
                'description' => $chocolate->description,
                'price' => $chocolate->price,
            ]);
        } else {
            return response()->json(['error' => 'Chocolate not found'], 404);
        }
    }
}
