@extends('layouts.app')

@section('script')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <script src="{{ URL::asset('js/calendar/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/calendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/calendar/calendar.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/calendar.min.css') }}"/>
    <script>
        $('#calendar').fullCalendar({
            windowResize: function(view) {
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
                    <div class="panel-heading">{{$user->name}} {{$user->surname}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            Adres e-mail: {{$user->email}}<br>
                            Miasto: {{$user->city}}<br>
                            Adres: {{$user->address}}<br>
                            Telefon: {{$user->phone}}
                            <div class="col-md-10  col-md-offset-1">
                                    <br>
                                    {!! $calendar->calendar() !!}
                                    {!! $calendar->script() !!}
                                    <br>
                                    <div class="col-md-8 col-md-offset-2">
                                        <a href="{{url()->previous()}}" value="home" class="btn btn-primary pull-left">Back</a>
                                        <a href="" class="btn btn-primary  ">New meeting</a>
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
        </div>
    <br><br>
@endsection