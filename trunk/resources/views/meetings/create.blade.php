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
            <div class="col-md-10 col-md-offset-1">
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
                                <label class="control-label panel-heading" > You can specify a time manualy</label>


                                <form action="{{route('meetings.store')}}" method="post">
                                    <div>

                                        <label for="start_date"  class="col-md-4 control-label">Start date</label>
                                        <div class="col-md-8">
                                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                                            <br>
                                    </div>
                                        </div>
                                    <div class="col-md-12">
                                        <label for="allday" class="col-md-4 control-label">All day</label>

                                        <div class="col-md-8">
                                            <input type="hidden" class="control-label" value="0" name="allday"/>

                                            <input type="checkbox"  class="control-label" id="allDayCheck" name="allday" value="1" onclick="hideElements()" />
                                            <br><br>
                                        </div>

                                    </div>


                                    <div>

                                        <label for="start_time" class="col-md-4 toHide control-label ">Start time</label>
                                        <div class="col-md-8">
                                        <input type="time" name="start_time" class="form-control toHide"

                                               value="{{ old('start_time') }}">
                                            <br>

                                    </div>
                                        </div>
                                    <div>
                                        <label for="end_date" class="col-md-4 toHide control-label">End date</label>
                                        <div class="col-md-8">
                                        <input type="date" name="end_date" class="toHide form-control" value="{{ old('end_date') }}">
                                            <br>
                                    </div>
                                    </div>
                                    <div>
                                        <label for="end_time" class="col-md-4 toHide control-label">End time</label>
                                        <div class="col-md-8">
                                        <input type="time" name="end_time" class="toHide form-control"  value="{{ old('end_time') }}">
                                            <br>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="private" class="col-md-4 control-label">Private</label>
                                        <div class="col-md-8">
                                        <input type="hidden" value="0"  name="private"/>
                                        <input type="checkbox" name="private"  value="private"/>
                                            <br><br>
                                    </div>
                                            </div>
                                    <input type="text" name="user2_id" value="{{$id}}" hidden>
                                    <input type="text" name="start" value="" hidden>
                                    <input type="text" name="end" value="" hidden>
                                    <div>

                                        <div class="col-md-12">

                                        <input type="submit" value="Create" class="btn btn-primary"><br>
                                        {{csrf_field()}}
                                    </div>
                                        </div>

                                </form>
                            </div>

                            <br>
                            <div class="col-md-2">
                                <br><br>
                                <h3>or</h3>


                                <a href="{{url()->previous()}}" value="Back">Back</a>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{route('meetings.search', $id)}}" method="post">

                                <label class="control-label panel-heading">   Let me do that for you</label>

                                    <div>
                                        <label for="date" class="col-md-4  control-label">Date</label>
                                        <div class="col-md-8">
                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                            <br>
                                    </div>
                                        </div>
                                    <div>
                                        <label for="time" class="col-md-4  control-label">Between</label>
                                            <div class="col-md-8">
                                        <input type="time" name="time"  class="form-control" value="{{ old('time') }}">
                                                <br>
                                                </div>
                                        <label for="time2" class="col-md-4 control-label">and</label>
                                        <div class="col-md-8">
                                        <input type="time" name="time2" class="form-control" value="{{ old('time2') }}">
                                            <br>
                                            </div>
                                    </div>
                                    <div>
                                        <label for="duration" class="col-md-4 control-label">Duration</label>
                                        <div class="col-md-8">
                                        <input type="time" name="duration" class="form-control" value="{{ old('duration') }}">
                                            <br>
                                    </div>
                                        </div>

                                        <div class="col-md-12">
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
    </div>
    <br><br>
@endsection