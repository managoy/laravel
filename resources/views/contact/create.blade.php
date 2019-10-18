@extends('layouts.app')

@section('title','Contact Us')

@section('content')

    <h1>Contact us</h1>

    @if( ! session()->has('message'))
        <form action="/contact" method="POST">
            @csrf
            <label for="name">Name:</label>
            <div class="form-group">
                <input type="text" name="name" value="{{old('name') }}" class="form-control" required>
                <div>{{ $errors->first('name') }}</div>
            </div>
            <label for="email">Email:</label>
            <div class="form-group">
                <input type="text" name="email" value="{{old('email') }}" class="form-control" required>
                <div>{{ $errors->first('email') }}</div>
            </div>
            <label for="message">Message:</label>
            <div class="form-group">
            <textarea name="description" value="{{old('description') }}" cols="30" rows="10"
                      class="form-control" required></textarea>
                <div>{{ $errors->first('description') }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    @endif
@endsection
