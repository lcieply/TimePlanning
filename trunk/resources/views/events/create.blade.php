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
                    <div class="panel-heading">New Event</div>
                    <div class="panel-body">
                        <form action="{{route('events.store')}}" method="post" form-horizontal class="form-horizontal">
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">All day</label>
                                <div class="col-md-6">
                                    <input type="checkbox" id="allDayCheck" name="allday" value="0" onclick="hideElements()"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="col-md-4 control-label">Start date</label>
                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control"
                                           value="{{ old('start_date') }}">
                                </div>
                            </div>
                            <div class="form-group toHide">
                                <label for="start_time" class="col-md-4 control-label">Start time</label>
                                <div class="col-md-6">
                                    <input type="time" name="start_time" class="form-control"
                                           value="{{ old('start_time') }}">
                                </div>
                            </div>
                            <div class="form-group toHide">
                                <label for="end_date" class="col-md-4 control-label">End date</label>
                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control"
                                           value="{{ old('end_date') }}">
                                </div>
                            </div>
                            <div class="form-group toHide">
                                <label for="end_time" class="col-md-4 control-label">End time</label>
                                <div class="col-md-6">
                                    <input type="time" name="end_time" class="form-control"
                                           value="{{ old('end_time') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Private</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="0" name="private"/>
                                    <input type="checkbox" value="1" name="private"/>
                                </div>
                            </div>

                            <input type="text" name="start" value="" hidden>
                            <input type="text" name="end" value="" hidden>

                            <div class="col-md-8 col-md-offset-2">

                                <input type="submit" value="Create" class="btn btn-primary pull-right ">
                                {{csrf_field()}}

                            <div class="col-md-8 col-md-offset-2 pull-left">
                                <a href="{{route('home.index')}}" class="btn btn-primary">Back</a>
                            </div>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection