@extends('layouts.default')

@section('content')
    <div id="tree" class="tree" data-url="/nodes"></div>
    <script>
        $('#tree').tree({
            dataUrl: '/nodes',
            autoOpen: 0,
            dragAndDrop: true
        });
    </script>
@endsection