<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    // Show the checkout page with cart details
    public function showCheckout()
    {
        // Get the cart from session
        $cart = Session::get('cart', []);
        $totalPrice = 0;

        // Calculate total price
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Return checkout view with cart and total price
        return view('checkout.checkout', compact('cart', 'totalPrice'));
    }

    // Handle the checkout processing (e.g., payment, order creation)
    public function processCheckout(Request $request)
    {
        // Get the cart data from session
        $cart = Session::get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        // Calculate total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Process the payment (you can integrate with a payment gateway here)
        // Assume payment is successful

        // Clear the cart after successful payment
        Session::forget('cart');

        // Redirect to success page with cart and total price
        return redirect()->route('checkout.success')->with(['cart' => $cart, 'totalPrice' => $totalPrice]);
    }

    // Show the success page after successful checkout
    public function checkoutSuccess()
    {
        // Retrieve the cart and total price from the session or flash data
        $cart = session('cart', []);
        $totalPrice = session('totalPrice', 0);

        // Return the confirmation view with the cart and total price
        return view('checkout.confirmation', compact('cart', 'totalPrice'));
    }
}
