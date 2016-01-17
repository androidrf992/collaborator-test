@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <span class="sort" data-column="full_name">Full name</span>
                        </td>
                        <td>
                            <span class="sort" data-column="post">Post</span>
                        </td>
                        <td>
                            <span class="sort" data-column="salary">Salary</span>
                        </td>
                        <td>
                            <span class="sort" data-column="create_at">Date</span>
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
                                {!! Html::link("/collaborator/{$collaborator->id}", 'View', [
                                    'class' => 'btn btn-primary',
                                ]) !!}

                                {!! Html::link("/collaborator/{$collaborator->id}/edit", 'Edit', [
                                    'class' => 'btn btn-primary',
                                ]) !!}

                                {!! Html::link("/collaborator/{$collaborator->id}", 'Delete', [
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