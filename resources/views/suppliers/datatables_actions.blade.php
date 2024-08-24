{!! Form::open(['route' => ['suppliers.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('suppliers.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('suppliers.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fas fa-pencil-alt"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}