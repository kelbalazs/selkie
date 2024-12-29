@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Chocolate</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>£{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>£{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total: £{{ number_format($totalPrice, 2) }}</h3>

        <a href="{{ route('checkout.show') }}" class="btn btn-primary">Proceed to Checkout</a>
        @else
        <p>Your cart is empty.</p>
    @endif
@endsection
