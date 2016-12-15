@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$meeting->getTitle()}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="start_time" class="col-md-4 control-label">Start time: </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="start_time" class="form-control" VALUE="{{ $meeting->start_time  }} "
                                           size="20" readonly>
                                </div>
                            </div>
                            <label for="end_time" class="col-md-4 control-label">End time: </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="end_time" class="form-control" VALUE="{{ $meeting->end_time  }} "
                                           size="20" readonly>
                                </div>
                            </div>
                            @if($user==$meeting->user_id || $user==$meeting->user2_id)
                            <label for="private" class="col-md-4 control-label">Private: </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-1">
                                    <input name="private" type="checkbox" @if($meeting->private ) checked
                                           @endif disabled>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <br>
                                    <div class="col-md-6  col-md-offset-2">
                                        @if($user==$meeting->user_id || $user==$meeting->user2_id)
                                            <a href="{{route('home.index')}}" value="home"
                                               class="btn btn-primary pull-left">Back</a>
                                            <a href="{{route('meetings.edit', $meeting)}}" value="Edit"
                                               class="btn btn-primary  ">Edit</a>
                                        @else
                                            <a href="{{url()->previous()}}" value="home"
                                               class="btn btn-primary pull-left">Back</a>
                                        @endif
                                    </div>
                                    @if($user==$meeting->user_id || $user==$meeting->user2_id)
                                        <div class="col-md-2 ">

                                            <form action="{{route('meetings.destroy', $meeting)}}" method="post"
                                                  form-horizontal class="form-horizontal">
                                                <input type="submit" value="Delete" class="btn btn-primary ">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                        </div>
                                    @endif
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