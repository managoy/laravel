@extends('layout')

@section('title','Contact Us')

@section('content')

    <h1>Contact us</h1>

    <form action="/contact" method="POST">
        <label for="name">Name:</label>
        <div class="form-group">
            <input type="text" name="name" value="{{old('name') }}" class="form-control">
            <div>{{ $errors->first('name') }}</div>
        </div>


        <label for="email">Email:</label>
        <div class="form-group">
            <input type="text" name="email" value="{{old('email') }}"  class="form-control">
            <div>{{ $errors->first('email') }}</div>
        </div>

        <label for="message">Message:</label>
        <div class="form-group">
            <textarea name="description" id="" value="{{old('message') }}"  cols="30" rows="10" class="form-control"></textarea>
            <div>{{ $errors->first('description') }}</div>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection
