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