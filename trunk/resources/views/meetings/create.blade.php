@extends('layouts.app')
@section('script')
    <script type="text/javascript">
        function hideElements() {
            if (document.getElementById("allDayCheck").checked) {
                $(".toHide").attr('disabled', true);
                $(".toHide").attr('hidden', true);
            } else {
                $(".toHide").attr('disabled', false);
                $(".toHide").attr('hidden', false);
            }

        }
    </script>
@endsection
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    @foreach ($errors->all() as $message)
                        <p class="alert alert-warning">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message }}
                        </p>
                    @endforeach
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">New Meeting</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>You can specify a time manualy</h4>
                                <form action="{{route('meetings.store')}}" method="post">
                                    <div>
                                        <label for="start_date">Start date</label>
                                        <input type="date" name="start_date" value="{{ old('start_date') }}">
                                    </div>
                                    <div>
                                        <label for="allday">All day</label>
                                        <input type="hidden" value="0" name="allday"/>
                                        <input type="checkbox" id="allDayCheck" name="allday" value="1" onclick="hideElements()"/>
                                    </div>
                                    <div>
                                        <label for="start_time" class="toHide">Start time</label>
                                        <input type="time" name="start_time" class="toHide"
                                               value="{{ old('start_time') }}">
                                    </div>
                                    <div>
                                        <label for="end_date" class="toHide">End date</label>
                                        <input type="date" name="end_date" class="toHide" value="{{ old('end_date') }}">
                                    </div>
                                    <div>
                                        <label for="end_time" class="toHide">End time</label>
                                        <input type="time" name="end_time" class="toHide" value="{{ old('end_time') }}">
                                    </div>
                                    <div>
                                        <label for="private">Private</label>
                                        <input type="hidden" value="0" name="private"/>
                                        <input type="checkbox" name="private" value="private"/>
                                    </div>
                                    <input type="text" name="user2_id" value="{{$id}}" hidden>
                                    <input type="text" name="start" value="" hidden>
                                    <input type="text" name="end" value="" hidden>
                                    <div>
                                        <input type="submit" value="Create" class="btn btn-primary pull-right">
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <h3>or</h3>
                            </div>
                            <div class="col-md-4 ">
                                <h4>Let me do that for you</h4>
                                <form action="{{route('meetings.search', $id)}}" method="post">
                                    <div>
                                        <label for="date">Date</label>
                                        <input type="date" name="date" value="{{ old('date') }}">
                                    </div>
                                    <div>
                                        <label for="time">Between</label>
                                        <input type="time" name="time" value="{{ old('time') }}">
                                        <label for="time2">and</label>
                                        <input type="time" name="time2" value="{{ old('time2') }}">
                                    </div>
                                    <div>
                                        <label for="duration">Duration</label>
                                        <input type="time" name="duration" value="{{ old('duration') }}">
                                    </div>
                                    <div>
                                        <input type="submit" value="Search" class="btn btn-primary pull-right">
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
    <br><br>
@endsection