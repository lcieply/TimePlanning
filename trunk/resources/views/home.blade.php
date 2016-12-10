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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-9 col-md-offset-2">
<br><br><br>

                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection