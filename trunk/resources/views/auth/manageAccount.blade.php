@extends('layouts.app')

@section('content')


    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="home">Home</a>
    <br><br>
    <form method="post" action="{{ route('users.update') }}">
        <label for="name">Name:</label>
        <input type="text" value="{{ $user->name }}" name="name"><br>

        <label for="surname">Surname:</label>
        <input type="text" value="{{ $user->surname }}" name="surname"><br>

        <label>Email address:</label>
        <input type="text" value="{{ $user->email }}" disabled><br>

        <label for="city">City:</label>
        <input type="text" value="{{ $user->city }}" name="city"><br>

        <label for="address">Address:</label>
        <input type="text" value="{{ $user->address }}" name="address"><br>

        <label for="phone">Phone:</label>
        <input type="text" value="{{ $user->phone }}" name="phone"><br>

        <input type="submit" value="Save changes">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    </form>


@endsection