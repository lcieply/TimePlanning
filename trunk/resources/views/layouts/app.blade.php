<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Time planning') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('css/calendar.min.css') }}"/>
    <!-- Scripts -->
    <script>

        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script src="/js/app.js"></script>

    @yield('script')
</head>



<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">LOGIN</a></li>
                        <li><a href="{{ url('/register') }}">REGISTER</a></li>
                    @else
                        <li>
                            <form action="{{route('users.search')}}" method="post" form-horizontal class="navbar-form pull-left">

                                <div class="input-group custom-search-form ">

                                    <input type="text" class="form-control" name="search" placeholder="Search for a user...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default-sm" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>

                                {{csrf_field()}}
                            </form>
                        </li>
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('users.edit', Auth::id()) }}">
                                        MANAGE ACCOUNT
                                    </a>


                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                       LOGOUT
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                         </li>


                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>


<footer>
    <! --- FOOTER & social links --->

    <h5>2016 &copy by:   <a href="https://bitbucket.org/mmaniek95/">  Marta Mańka  <i class="fa fa-bitbucket fa-fw fa-1x"></i></a>
        <a href="https://bitbucket.org/kamilJur/">  Kamil Jureczka  <i class="fa fa-bitbucket fa-fw fa-1x"></i></a>
        <a href="https://bitbucket.org/lcieply/">  Łukasz Ciepły  <i class="fa fa-bitbucket fa-fw fa-1x"></i></a>
        <a href="https://bitbucket.org/radopopulos/">  Radosław Ciupek  <i class="fa fa-bitbucket fa-fw fa-1x"></i></a>
    </h5>

</footer>
</body>
</html>
