<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        {!! Html::style('/css/style.css', [
            'rel' => 'stylesheet',
        ]) !!}

        {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', [
            'rel' => 'stylesheet',
            'integrity' => 'sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7',
            'crossorigin' => 'anonymous',
        ]) !!}
    </head>
    <body>
        <header>
            <nav>
                <a href="/">Home</a>
                <a href="/collaborator">List</a>
            </nav>
        </header>
        @yield('content')
        {!! Html::script('//code.jquery.com/jquery-1.12.0.min.js') !!}

        {!! Html::script('/js/ajax.js') !!}
    </body>
</html>
