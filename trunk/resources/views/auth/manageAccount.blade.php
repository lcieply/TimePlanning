@extends('layouts.app')

@section('content')
    <br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage account</div>
                <div class="panel-body">


    <form class="form-horizontal" role="form" method="post" action="{{ route('users.update') }}">
        <div class="form-group">
        <label for="name" class="col-md-4 control-label">Name: </label>
            <div class="col-md-6">
        <input  class="form-control" type="text" value="{{ $user->name }}" name="name">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
            </div>
            </div>
        <div class="form-group">

        <label for="surname" class="col-md-4 control-label">Surname: </label>
            <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $user->surname }}" name="surname">
        @if ($errors->has('surname'))
            <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Email address: </label>
            <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
        </div>
            </div>
        <div class="form-group">
        <label for="city" class="col-md-4 control-label">City:</label>
            <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $user->city }}" name="city">
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label for="address" class="col-md-4 control-label">Address: </label>
            <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $user->address }}" name="address">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
        </div>
            </div>
        <div class="form-group">
        <label for="phone"class="col-md-4 control-label">Phone: </label>
            <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $user->phone }}" name="phone">
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
            </div>
            </div>

        <div class="col-md-8 col-md-offset-2">
           <div class="form-group col-md-7 pull-left control-label">
        <input type="submit" value="Save changes"  class="btn btn-primary">
        {{ csrf_field() }}

    </form >

             </div>
    <form  action="home" method="get">
        <div class="form-group col-md-6 pull-right control-label" >

        <input type="submit" value="Back" class="btn btn-primary" >
        {{csrf_field()}}
        </div>
    </form>
                      </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection