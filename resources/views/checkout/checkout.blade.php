<!-- resources/views/checkout/checkout.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Checkout</h2>

    <p>Review your order and proceed to payment.</p>

    <!-- Cart Summary -->
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
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

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Proceed with Checkout</button>
    </form>
@endsection
