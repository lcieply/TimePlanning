<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>
<! --- MENU  --->
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div id="menu" class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">STRONA GŁÓWNA</a>
            @else
                <a href="{{ url('/login') }}">ZALOGUJ</a>
                <a href="{{ url('/register') }}">REJESTRACJA</a>
            @endif
        </div>

    @endif
        <! --- PANEL --->

    <div id="panel" class="content">
        <div class="title m-b-md">
            Time planning </br>
        </div>
        <div class="title2">
            Zaplanuj swój czas co do minuty!
        </div>
    </div>
</div>
<footer>
    <! --- FOOTER & social links --->

    <h5>2016 &copy by: Marta Mańka  Kamil Jureczka Łukasz Ciepły Radosław Ciupek </h5>

<!---------------
    <br>
    <ul class="list-inline">
        <li>
            <a href="https://bitbucket.org/mmaniek95/"><i class="fa fa-bitbucket fa-fw fa-3x"></i></a>
        </li>
        <li>
            <a href="https://bitbucket.org/kamilJur/"> <i class="fa fa-bitbucket fa-fw fa-3x"></i></a>
        </li>
        <li>
            <a href="https://bitbucket.org/lcieply/"><i class="fa fa-bitbucket fa-fw fa-3x"></i></a>
        </li>
        <li>
            <a href="https://bitbucket.org/radopopulos/"> <i class="fa fa-bitbucket fa-fw fa-3x"></i></a>
        </li>
    </ul>
------------!>
</footer>
</body>
</html>