@extends('layouts.default')

@section('content')


    <div class="show">
        @foreach ($errors->all() as $error)
            <span class="error">{{$error}}</span>
        @endforeach
        {!! Form::open([
            'url' => '/collaborator/' . $model->id,
            'enctype' => 'multipart/form-data',
            'method' => 'put',
        ]) !!}
        <div class="form-group">
            {!! Form::label('full_name', 'Full name') !!}
            {!! Form::text('full_name', $model->full_name, [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('post', 'Post') !!}
            {!! Form::select('post', [
                'manager' => 'manager',
                'SEO' => 'SEO',
                'tester' => 'tester',
                'developer' => 'developer',
            ], $model->post, [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('salary', 'Salary') !!}
            {!! Form::text('salary', $model->salary, [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            @if($model->photo)
                {!! Html::image('/uploads/origin/' . $model->photo, '', [
                    'class' => 'image',
                ]) !!}
            @endif
            {!! Form::file('photo', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('chief', 'Chief') !!}
            {!! Form::text('', $chief ? $chief->full_name : '', [
                'class' => 'form-control',
                'id' => 'chief',
            ]) !!}
            {!! Form::hidden('chief', $chief ? $chief->id : '', [
                'id' => 'hiddenChief',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('create_at', 'Date') !!}
            {!! Form::text('create_at', $model->create_at, [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', [
                'class' => 'btn btn-primary',
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(function() {
            var token = $('input[name = "_token"]').val();

            $( "#chief" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/collaborator/person",
                        dataType: "json",
                        type: 'post',
                        data: '_token=' + token + '&value=' + request.term,
                        success: function( data ) {
                            response(data);
                            response($.map(data, function(obj) {
                                return {
                                    label: obj.full_name,
                                    id: obj.id
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function( event, ui ) {
                    $('#hiddenChief').val(ui.item.id);
                },
                open: function() {
                    $(this).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                },
                close: function() {
                    $(this).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                },
            });
        });
    </script>
@endsection