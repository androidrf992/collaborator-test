@extends('layouts.default')

@section('content')
    <div class="auth-form">
        {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('', 'REGISTER OR') !!}
                {!! Html::link('/auth/login', 'LOGIN') !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', old('name'), [
                    'class' => 'form-control',
                ]) !!}
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
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                {!! Form::password('password_confirmation', [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Register', [
                    'class' => 'btn btn-primary register',
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection