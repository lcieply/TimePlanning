@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Event</div>
                    <div class="panel-body">
                            <div class="form-group">
                                {{ $event->title  }}
                            </div>
                            <div class="form-group">
                                {{ $event->name  }}
                            </div>
                            <div class="form-group">
                                {{ $event->start_time  }}
                            </div>
                            <div class="form-group">
                                {{ $event->end_time  }}
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <a href="{{route('events.edit', $event)}}" value="Edit" class="btn btn-primary  ">Edit</a>
                            </div>

                            <div class="form-group">
                                <form action="{{route('events.destroy', $event)}}" method="post" form-horizontal class="form-horizontal">
                                    <input type="submit" value="Delete" class="btn btn-primary pull-right ">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <a href="{{route('home.index')}}" value="Edit" class="btn btn-primary">Back</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection