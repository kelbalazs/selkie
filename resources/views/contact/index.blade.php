@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Contact Us</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection
