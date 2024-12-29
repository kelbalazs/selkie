@extends('layouts.app')

@section('content')
    <h1>Thank You for Your Order!</h1>

    <h3>Order Summary</h3>
    <p>Total Price: £{{ number_format($totalPrice, 2) }}</p>

    <h4>Items in Your Cart:</h4>
    <ul>
        @foreach ($cart as $item)
            <li>{{ $item['name'] }} ({{ $item['quantity'] }} x £{{ number_format($item['price'], 2) }})</li>
        @endforeach
    </ul>

    <p>Your order is now being processed.</p>
@endsection
