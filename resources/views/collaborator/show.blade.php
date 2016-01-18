@extends('layouts.default')

@section('content')
    <div class="show">
        <ul class="list-group">
            <li class="list-group-item">
                <span>Full name:</span>{{$model->full_name}}
            </li>
            <li class="list-group-item">
                <span>Post:</span>{{$model->post}}
            </li>
            <li class="list-group-item">
                <span>Salary:</span>{{$model->salary}}
            </li>
            <li class="list-group-item">
                <span>Photo:</span>
                @if($model->photo)
                    {!! Html::image('/uploads/origin/' . $model->photo, '', [
                        'class' => 'image',
                    ]) !!}
                @endif
            </li>
            <li class="list-group-item">
                <span>Chief:</span>
                @if($chief)
                    {{$chief->full_name}}
                @endif
            </li>
            <li class="list-group-item">
                <span>Date:</span>{{$model->create_at}}
            </li>
        </ul>
    </div>
@endsection