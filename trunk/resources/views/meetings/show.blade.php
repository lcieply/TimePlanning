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


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection