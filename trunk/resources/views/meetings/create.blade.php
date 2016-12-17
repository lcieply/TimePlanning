@extends('layouts.app')
@section('script')
    <script type="text/javascript">
        function hideElements()
        {
                if(document.getElementById("allDayCheck").checked) {
                    $(".toHide").attr('disabled', true);
                    $(".toHide").attr('hidden', true);
                }else{
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
                    <div>
                        <form action="{{route('meetings.store')}}" method="post">
                            <label for="allday">All day</label>
                            <input type="checkbox" id="allDayCheck" name="allday" value="allday" onclick="hideElements()" />
                            <br>
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}">
                            <br>
                            <label for="start_time" class = "toHide">Start time</label>
                            <input type="time" name="start_time" class = "toHide" value="{{ old('start_time') }}">
                            <br>
                            <label for="end_date" class = "toHide">End date</label>
                            <input type="date" name="end_date" class = "toHide" value="{{ old('end_date') }}">
                            <br>
                            <label for="end_time" class = "toHide">End time</label>
                            <input type="time" name="end_time" class = "toHide" value="{{ old('end_time') }}">
                            <br>
                            <label for="private">Private</label>
                            <input type="checkbox" name="private" value="private" />
                            <br>
                            <input type="text" name="user2_id" value="{{$id}}" hidden>
                            <input type="text" name="start" value="" hidden>
                            <input type="text" name="end" value="" hidden>
                            <input type="submit" value="Create" class="btn btn-primary pull-right">
                            {{csrf_field()}}
                        </form>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection