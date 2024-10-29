@extends('layouts.app')

@section('content')
    <h1>Our Chocolates</h1>
    <ul class="list-group">
        @foreach($chocolates as $chocolate)
            <li class="list-group-item">
                {{ $chocolate['name'] }} - {{ $chocolate['price'] }}
            </li>
        @endforeach
    </ul>
@endsection
