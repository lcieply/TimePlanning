@extends('layouts.app')

@section('content')
<br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

    <form class="form-horizontal" role="form" method="post" action="{{ route('users.update') }}">
        <div class="form-group">
        <label for="name" class="col-md-4 control-label">Name:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->name }}" name="name"><br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
            </div>
            </div>
        <div class="form-group">

        <label for="surname" class="col-md-4 control-label">Surname:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->surname }}" name="surname"><br>
        @if ($errors->has('surname'))
            <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Email address:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->email }}" disabled><br>
        </div>
            </div>
        <div class="form-group">
        <label for="city" class="col-md-4 control-label">City:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->city }}" name="city"><br>
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label for="address" class="col-md-4 control-label">Address:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->address }}" name="address"><br>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label for="phone"class="col-md-4 control-label">Phone:</label>
            <div class="col-md-6">
        <input type="text" value="{{ $user->phone }}" name="phone"><br>
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
            </div>
            </div>

        <div class="form-group">
        <input type="submit" value="Save changes"  class="btn btn-primary">
        {{ csrf_field() }}
        </div>

    </form>
  <div class="form-group">

    <form action="home" method="get">
        <input type="submit" value="Back" class="btn btn-primary" >
        {{csrf_field()}}

    </form>
  </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection