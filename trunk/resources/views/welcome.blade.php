@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Time Planning</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

</head>
<! --- MENU  --->
<body>
@section('content')
<div class="flex-center position-ref full-height">

        <! --- PANEL --->

    <div id="panel" class="content">
        <div class="title m-b-md">
            Time planning </br>
        </div>
        <div class="title2">
            Manage your free time!

        </div>
    </div>
</div>
@endsection
</body>
</html>