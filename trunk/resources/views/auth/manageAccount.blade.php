@extends('layouts.app')

@section('content')

    <a href="home">Home</a>
    <br><br>
    <form method="post">
        <label>Name:</label>
        <input type="text" value="{{ $user->name }}">
    </form>

    <form method="post">
        <label>Surname:</label>
        <input type="text" value="{{ $user->surname }}">
    </form>

    <form method="post">
        <label>Email address:</label>
        <input type="text" value="{{ $user->email }}" disabled>
    </form>

    <form method="post">
        <label>City:</label>
        <input type="text" value="{{ $user->city }}">
    </form>

    <form method="post">
        <label>Address:</label>
        <input type="text" value="{{ $user->address }}">
    </form>

    <form method="post">
        <label>Phone:</label>
        <input type="text" value="{{ $user->phone }}">
    </form>








@endsection