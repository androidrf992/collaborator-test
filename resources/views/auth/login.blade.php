@extends('layouts.default')

@section('content')
    <div class="auth-form">
        {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('', 'LOGIN OR') !!}
                {!! Html::link('/auth/register', 'REGISTER') !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', old('email'), [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', [
                    'class' => 'form-control',
                    'id' => 'password',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remember', 'Remember Me') !!}
                {!! Form::checkbox('remember', '', '', [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Login', [
                    'class' => 'btn btn-primary register',
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection