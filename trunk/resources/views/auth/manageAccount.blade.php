@extends('layouts.app')

@section('content')

    <br><br>
    <form method="post" action="{{ route('users.update') }}">
        <label for="name">Name:</label>
        <input type="text" value="{{ $user->name }}" name="name"><br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <label for="surname">Surname:</label>
        <input type="text" value="{{ $user->surname }}" name="surname"><br>
        @if ($errors->has('surname'))
            <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif

        <label>Email address:</label>
        <input type="text" value="{{ $user->email }}" disabled><br>

        <label for="city">City:</label>
        <input type="text" value="{{ $user->city }}" name="city"><br>
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif

        <label for="address">Address:</label>
        <input type="text" value="{{ $user->address }}" name="address"><br>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif

        <label for="phone">Phone:</label>
        <input type="text" value="{{ $user->phone }}" name="phone"><br>
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif

        <input type="submit" value="Save changes">
        {{ csrf_field() }}



    </form>

    <form action="home" method="get">
        <input type="submit" value="Back">
        {{csrf_field()}}

    </form>



@endsection