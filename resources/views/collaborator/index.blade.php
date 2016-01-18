@extends('layouts.default')

@section('assets')
    <script src="/js/ajax.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <span class="sort" data-column="full_name">Full name</span>
                            {!! Form::text('full_name', '', [
                                'class' => 'form-control search',
                            ]) !!}
                        </td>
                        <td>
                            <span class="sort" data-column="post">Post</span>
                            {!! Form::text('post', '', [
                                'class' => 'form-control search',
                            ]) !!}
                        </td>
                        <td>
                            <span class="sort" data-column="salary">Salary</span>
                            {!! Form::text('salary', '', [
                                'class' => 'form-control search',
                            ]) !!}
                        </td>
                        <td>
                            <span class="sort" data-column="create_at">Date</span>
                            {!! Form::text('create_at', '', [
                                'class' => 'form-control search',
                            ]) !!}
                        </td>
                        <td>
                            <span>Photo</span>
                        </td>
                        <td>
                            <span>Manager</span>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($model as $collaborator)
                        <tr>
                            <td>
                                {{$collaborator->full_name}}
                            </td>
                            <td>
                                {{$collaborator->post}}
                            </td>
                            <td>
                                {{$collaborator->salary}}
                            </td>
                            <td>
                                {{$collaborator->create_at}}
                            </td>
                            <td>
                                @if($collaborator->photo)
                                    {!! Html::image('/uploads/small/' . $collaborator->photo, '', [
                                    'class' => 'image',
                                ]) !!}
                                @endif
                            </td>
                            <td>
                                {!! Html::link("/collaborator/{$collaborator->id}", 'View', [
                                    'class' => 'btn btn-primary',
                                ]) !!}

                                {!! Html::link("/collaborator/{$collaborator->id}/edit", 'Edit', [
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {!! csrf_field() !!}
@endsection