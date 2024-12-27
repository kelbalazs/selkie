@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Cart</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if ($cart && count($cart) > 0)
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

            <a href="{{ route('cart.reset') }}" class="btn btn-danger">Reset Cart</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
