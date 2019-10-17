@extends('emails.contact.layout')


@section('content')


    <h1><i>Thank you for your message</i></h1>
    <h1>Name
    {{ $name }}
    </h1>
    <h2>Email</h2>
    {{ $email }}
   <h3>Message</h3>
    {{ $description }}


@endsection
