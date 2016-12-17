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
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
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
                    <div class="panel-heading">Meeting</div>
                    <div class="panel-body">
                        <form action="{{route('meetings.update', $meeting)}}" method="post" form-horizontal
                              class="form-horizontal">
                            <div class="form-group">
                                <label for="start_date" class="col-md-4 control-label">Start date</label>
                                <?php
                                $startdate = explode(" ", $meeting->start_time);
                                $starttime = substr($startdate[1], 0, 5);
                                ?>
                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control"
                                           value="{{ $startdate[0] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="allday" class="col-md-4 control-label">All day</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="0" name="allday"/>
                                    <input type="checkbox" value="1" name="allday" id="allDayCheck" onclick="hideElements()" @if($meeting->allday ) checked
                                            @endif/>
                                </div>
                            </div>
                            <div class="form-group toHide" @if($meeting->allday) disabled hidden @endif>
                                <label for="start_time" class="col-md-4 control-label">Start time</label>
                                <div class="col-md-6 toHide">
                                    <input type="time" name="start_time" class="form-control" value="{{ $starttime }}">
                                </div>
                            </div>

                            <div class="form-group toHide" @if($meeting->allday) disabled hidden @endif>
                                <label for="end_date" class="col-md-4 control-label">End date</label>
                                <?php
                                $enddate = explode(" ", $meeting->end_time);
                                $endtime = substr($enddate[1], 0, 5);
                                ?>
                                <div class="col-md-6 toHide" @if($meeting->allday) disabled hidden @endif>
                                    <input type="date" name="end_date" class="form-control" value="{{ $enddate[0] }}">
                                </div>
                            </div>

                            <div class="form-group toHide" @if($meeting->allday) disabled hidden @endif>
                                <label for="end_time" class="col-md-4 control-label">End time</label>
                                <div class="col-md-6">
                                    <input type="time" name="end_time" class="form-control" value="{{ $endtime }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="private" class="col-md-4 control-label">Private</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="0" name="private"/>
                                    <input type="checkbox" value="1" name="private" @if($meeting->private ) checked
                                            @endif/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <br>
                                    <div class=".col-md-6 col-md-offset-2">
                                        <input type="submit" value="Update" class="btn btn-primary pull-right ">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}


                                        <div class=".col-md-6 col-md-offset-2">
                                            <a href="{{route('meetings.show', $meeting)}}" value="Back"
                                               class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type = "text" name = "user2_id" value = "{{$meeting->user2_id}}" hidden>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection