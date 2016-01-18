@extends('layouts.default')

@section('assets')
    <link rel="stylesheet" href="/css/jqtree.css">
    <script src="/js/tree.jquery.js"></script>
@endsection

@section('content')
    <div id="tree" class="tree" data-token="{{csrf_token()}}" data-url="/nodes"></div>
    <script>
        $('#tree').tree({
            dataUrl: '/nodes',
            autoOpen: 0,
            dragAndDrop: true,
        });

        $('#tree').bind(
                'tree.move',
                function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'post',
                        data: 'chief=' +
                                event.move_info.target_node.id +
                                '&id=' + event.move_info.moved_node.id +
                                '&_token=' + $('#tree').attr('data-token'),
                        dataType: 'json',
                        url: '/collaborator/change-chief',
                        success: function(data){
                            event.move_info.do_move();
                        },
                        error: function () {
                            alert('A node cannot be moved to a descendant of itself (inside moved tree).');
                        },
                    });

                }
        );
    </script>
@endsection