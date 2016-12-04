@extends('layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                   Zostałeś zalogowany! To jest nasza strona główna (home)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
