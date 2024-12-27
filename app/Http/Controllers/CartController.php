<?php

namespace App\Http\Controllers;

use App\Traits\ChocolateData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    use ChocolateData;

    public function add(Request $request)
    {
        $chocolateId = $request->input('chocolate_id');
        $chocolate = collect($this->getChocolates())->firstWhere('id', $chocolateId);

        if (!$chocolate) {
            return response()->json(['error' => 'Chocolate not found.'], 404);
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$chocolateId])) {
            $cart[$chocolateId]['quantity'] += 1;
        } else {
            $cart[$chocolateId] = [
                'name' => $chocolate['name'],
                'price' => $chocolate['price'],
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
        return response()->json(['message' => 'Chocolate added to cart!', 'cart' => $cart]);
    }

    public function viewCart()
    {
        $cart = Session::get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('cart.view', compact('cart', 'totalPrice'));
    }

    public function resetCart()
    {
        Session::forget('cart');
        return redirect()->route('cart.view')->with('message', 'Your cart has been reset.');
    }
}