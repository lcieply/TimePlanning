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
                            <label for="title" class="col-md-4 control-label">Title: </label>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input name="title" class="form-control" VALUE=" {{ $event->title  }}" size="20" readonly>
                            </div>
                                </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name: </label>
                                <div class="col-md-6">
                            <div class="form-group">
                                <input  name="name" class="form-control" VALUE=" {{ $event->name  }}" size="20" readonly>

                            </div>
                                    </div>
                                <label for="start_time" class="col-md-4 control-label">Start time: </label>
                                <div class="col-md-6">
                                    <div class="form-group">

                                <input  name="start_time" class="form-control" VALUE="{{ $event->start_time  }} " size="20" readonly>

                            </div>
                                        </div>
                         <label for="end_time" class="col-md-4 control-label">End time: </label>
                          <div class="col-md-6">
                            <div class="form-group">
                                <input name="end_time" class="form-control" VALUE="{{ $event->end_time  }} " size="20" readonly>
                            </div>
                </div>
<br>
                                <div class="col-md-4  col-md-offset-2 pull-left">

                        <a href="{{route('home.index')}}" value="home" class="btn btn-primary">Back</a>

                                    <div class="col-md-6  col-md-offset-2">
                                <a href="{{route('events.edit', $event)}}" value="Edit" class="btn btn-primary  ">Edit</a>
                        </div>
                            </div>
                        <div class="col-md-2">

    <form action="{{route('events.destroy', $event)}}" method="post" form-horizontal class="form-horizontal">
                              <input  type="submit" value="Delete" class="btn btn-primary ">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
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