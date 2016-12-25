@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>

    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Search results</h4></div>
                    <div class="panel-body">
                        <div class="form-group">
                        @if($users==NULL)
                                Any search results
                        @else
                            @foreach($users as $user)
                                <a href="{{ route('users.show', $user->id)}}">
                                    {{$user->name}} {{$user->surname}} &nbsp;&nbsp;&nbsp; {{$user->email}}
                                    &nbsp;&nbsp;&nbsp; {{$user->city}} {{$user->address}} &nbsp;&nbsp;&nbsp; {{$user->phone}}
                                </a><br>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection