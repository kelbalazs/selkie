<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChocolateController extends Controller
{
    public function index()
    {
        return view('welcome'); // create a welcome.blade.php view
    }

    public function showChocolates()
    {
        // Example array of chocolates
        $chocolates = [
            ['name' => 'Dark Chocolate', 'price' => '$5'],
            ['name' => 'Milk Chocolate', 'price' => '$4'],
            ['name' => 'White Chocolate', 'price' => '$6'],
        ];
        return view('chocolates.index', compact('chocolates'));
    }
}
