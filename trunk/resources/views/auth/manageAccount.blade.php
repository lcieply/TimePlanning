@extends('layouts.app')

@section('content')

    <a href="home">Home</a>
    <br><br>
    <form method="post">
        <label>Name:</label>
        <input type="text" value="{{ $user->name }}"><Br>

        <label>Surname:</label>
        <input type="text" value="{{ $user->surname }}"><br>

        <label>Email address:</label>
        <input type="text" value="{{ $user->email }}" disabled><br>

        <label>City:</label>
        <input type="text" value="{{ $user->city }}"><br>

        <label>Address:</label>
        <input type="text" value="{{ $user->address }}"><br>

        <label>Phone:</label>
        <input type="text" value="{{ $user->phone }}"><br>

        <input type="submit" value="Confirm">









@endsection