@extends('layouts.app')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage account</div>
                    <div class="panel-body">
                        <form form-horizontal class="form-horizontal" role="form" method="post"
                              action="{{ route('users.update', $user) }}">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name: </label>
                                <div class="col-md-6">

                                    <input class="form-control" type="text" name="name"
                                        @if ($errors->has('name'))
                                            value="{{ old('name') }}"
                                        @else
                                           value="{{ $user->name }}"
                                        @endif
                                    >
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
                                    <input type="text" class="form-control" name="surname"
                                        @if ($errors->has('surname'))
                                            value="{{ old('surname') }}"
                                        @else
                                           value="{{ $user->surname }}"
                                        @endif
                                    >
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
                                    <input type="text" class="form-control" name="city"
                                       @if ($errors->has('city'))
                                           value="{{ old('city') }}"
                                       @else
                                           value="{{ $user->city }}"
                                       @endif
                                    >
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
                                    <input type="text" class="form-control" name="address"
                                        @if ($errors->has('address'))
                                           value="{{ old('address') }}"
                                        @else
                                           value="{{ $user->address }}"
                                        @endif
                                    >
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone"
                                       @if ($errors->has('phone'))
                                           value="{{ old('phone') }}"
                                       @else
                                           value="{{ $user->phone }}"
                                       @endif
                                    >
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class=".col-md-8 col-md-offset-2">

                                <a href="{{route('home.index')}}" class="btn btn-primary">Back</a>


                                    <input type="submit" value="Save changes" class="btn btn-primary">
                                    {{ csrf_field() }}
                                    </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection