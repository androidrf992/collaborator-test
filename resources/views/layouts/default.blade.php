<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        {!! Html::style('/css/style.css', [
            'rel' => 'stylesheet',
        ]) !!}
        {!! Html::style('/css/jqtree.css', [
            'rel' => 'stylesheet',
        ]) !!}
        {!! Html::style('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', [
            'rel' => 'stylesheet',
        ]) !!}
        {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', [
            'rel' => 'stylesheet',
            'integrity' => 'sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7',
            'crossorigin' => 'anonymous',
        ]) !!}
        {!! Html::script('//code.jquery.com/jquery-1.12.0.min.js') !!}
        {!! Html::script('//code.jquery.com/ui/1.11.4/jquery-ui.js') !!}
        {!! Html::script('/js/tree.jquery.js') !!}
    </head>
    <body>
        <header>
            <nav>
                <a href="/">Home</a>
                <a href="/collaborator">List</a>
            </nav>
        </header>
        @yield('content')

        {!! Html::script('/js/ajax.js') !!}
    </body>
</html>
