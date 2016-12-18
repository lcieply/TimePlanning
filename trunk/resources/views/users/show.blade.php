@extends('layouts.app')



@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <br><br><br><br>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$user->name}} {{$user->surname}}</div>
                    <div class="panel-body">





                        <label for="email" class="col-md-4 control-label"> Adres e-mail: </label>
                        <div class="col-md-6">
                            <input name="title" class="form-control" VALUE=" {{$user->email}}" size="10" readonly><br>

                        </div>

                        <label for="city" class="col-md-4 control-label"> Miasto: </label>
                        <div class="col-md-6">

                            <input name="city" class="form-control" VALUE=" {{$user->city}}" size="10" readonly><br>


                        </div>


                        <label for="address" class="col-md-4 control-label"> Adres: </label>
                        <div class="col-md-6">
                            <input name="address" class="form-control" VALUE=" {{$user->address}}" size="10"
                                   readonly><br>


                        </div>

                        <label for="email" class="col-md-4 control-label"> Telefon: </label>
                        <div class="col-md-6">
                            <input name="title" class="form-control" VALUE=" {{$user->phone}}" size="10" readonly><br>


                        </div>


                        <div id="kalendarz" class="col-md-9 ">
                            <br>
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                            <br>
                            <div class="col-md-8 col-md-offset-2">
                                <a href="{{url()->previous()}}" value="search" class="btn btn-primary pull-left">Back</a>
                                <a href="{{route('meetings.create', $user->id)}}" class="btn btn-primary  ">New meeting</a>
                                <br><br>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
    </div>
    </div>


        <h1> This user hasn't exist yet!!!</h1>
    <br><br>


@endsection