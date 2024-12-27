<?php

namespace App\Http\Controllers;

use App\Traits\ChocolateData;
use Illuminate\Http\Request;

class ChocolateController extends Controller
{
    use ChocolateData;

    public function index()
    {
        return view('welcome');
    }

    public function showChocolates()
    {
        $chocolates = $this->getChocolates();
        return view('chocolates.index', compact('chocolates'));
    }

    public function getChocolateDetails($id)
    {
        $chocolates = $this->getChocolates();
        $chocolate = collect($chocolates)->firstWhere('id', $id);

        if ($chocolate) {
            return response()->json($chocolate);
        } else {
            return response()->json(['error' => 'Chocolate not found'], 404);
        }
    }
}