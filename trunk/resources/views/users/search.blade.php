@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>

    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search results</div>
                    <div class="panel-body">
                        <div class="form-group">

 @if($user==NULL)

    Any search results
@else


                                <a href="{{ route('users.show', $user->id)}}">
                                {{$user->name}} {{$user->surname}} {{$user->email}}
                                {{$user->city}} {{$user->address}} {{$user->phone}}
                                </a>
                                    <br>




@endif

                        </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>

@endsection