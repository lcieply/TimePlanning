@extends('layouts.app')
@section('script')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <script src="{{ URL::asset('js/calendar/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/calendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/calendar/calendar.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/calendar.min.css') }}"/>
    <script>
        $('#calendar').fullCalendar({
            windowResize: function (view) {
                alert('The calendar has adjusted to a window resize');
            }
        });
    </script>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{$user->name}} {{$user->surname}}</h4></div>
                    <div class="panel-body">
                        <label for="email" class="col-md-4 control-label"> Adres e-mail: </label>
                        <div class="col-md-6">
                            <input name="title" class="form-control" VALUE=" {{$user->email}}" size="10" readonly>
                            <br>
                        </div>
                        <label for="city" class="col-md-4 control-label"> Miasto: </label>
                        <div class="col-md-6">
                            <input name="city" class="form-control" VALUE=" {{$user->city}}" size="10" readonly>
                            <br>
                        </div>
                        <label for="address" class="col-md-4 control-label"> Adres: </label>
                        <div class="col-md-6">
                            <input name="address" class="form-control" VALUE=" {{$user->address}}" size="10" readonly>
                            <br>
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
                            @if(Auth::id() != $user->id)
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="col-md-8 col-md-offset-2">
                                        <a href="{{route('meetings.create', $user->id)}}" class="btn btn-primary  ">New
                                            meeting</a>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection





















