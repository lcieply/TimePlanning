<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
<link href="/css/app.css" rel="stylesheet">
<!DOCTYPE html>
<html>
    <head>
        <title>404 - page not found</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="alert alert-danger">
                    <strong>Oooooppppsss! The page cannot be found.</strong>
                <br><br>
                    Not to worry. You can either head back to <a href="{{route('home.index')}}">our homepage</a>, or sit there and wait until we fix it (probably never).
                </div>
            </div>
        </div>
    </body>
</html>
