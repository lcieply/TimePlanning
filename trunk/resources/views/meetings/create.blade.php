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
                            <div class="col-md-5">
                                <label class="control-label"> You can specify a time manualy</label>
                                <br>
                                <form action="{{route('meetings.store')}}" method="post">
                                    <div>

                                        <label for="start_date"  class=" control-label">Start date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                                    </div>
                                    <div>
                                        <label for="allday" class=" control-label">All day</label>
                                        <input type="hidden" class="form-control"value="0" name="allday"/>
                                        <input type="checkbox" id="allDayCheck" name="allday" value="1" onclick="hideElements()"/>
                                    </div>
                                    <div>
                                        <label for="start_time" class="toHide control-label">Start time</label>
                                        <input type="time" name="start_time" class="form-control"class="toHide"
                                               value="{{ old('start_time') }}">
                                    </div>
                                    <div>
                                        <label for="end_date" class="toHide control-label">End date</label>
                                        <input type="date" name="end_date" class="toHide form-control" value="{{ old('end_date') }}">
                                    </div>
                                    <div>
                                        <label for="end_time" class="toHide control-label">End time</label>
                                        <input type="time" name="end_time" class="toHide form-control"  value="{{ old('end_time') }}">
                                    </div>
                                    <div>
                                        <label for="private" class="control-label">Private</label>
                                        <input type="hidden" value="0"  name="private"/>
                                        <input type="checkbox" name="private"  value="private"/>
                                    </div>
                                    <input type="text" name="user2_id" value="{{$id}}" hidden>
                                    <input type="text" name="start" value="" hidden>
                                    <input type="text" name="end" value="" hidden>
                                    <div>
                                        <br>
                                        <input type="submit" value="Create" class="btn btn-primary">
                                        {{csrf_field()}}
                                    </div>

                                </form>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <h3>or</h3>


                                <a href="{{url()->previous()}}" value="Back">Back</a>
                            </div>
                            <div class="col-md-5 ">
                                <label class="control-label">   Let me do that for you</label>
<br>
                                <form action="{{route('meetings.search', $id)}}" method="post">
                                    <div>
                                        <label for="date" class="control-label">Date</label>
                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                    </div>
                                    <div>
                                        <label for="time" class="control-label">Between</label>
                                        <input type="time" name="time"  class="form-control" value="{{ old('time') }}">
                                        <label for="time2" class="control-label">and</label>
                                        <input type="time" name="time2" class="form-control" value="{{ old('time2') }}">
                                    </div>
                                    <div>
                                        <label for="duration" class="control-label">Duration</label>
                                        <input type="time" name="duration" class="form-control" value="{{ old('duration') }}">
                                    </div>
                                    <div>
                                        <br><br>
                                        <input type="submit" value="Search" class="btn btn-primary ">
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