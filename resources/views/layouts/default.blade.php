<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/style.css">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    </head>
    <body>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        @yield('assets')
        <header>
            <nav>
                <a href="/">Home</a>
                <a href="/collaborator">List</a>
            </nav>
        </header>
        @yield('content')
    </body>
</html>
