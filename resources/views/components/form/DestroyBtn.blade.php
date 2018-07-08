{!! Form::open(['route' => [$route, $id], 'method' => 'DELETE']) !!}
    {{ Form::submit($label, array_merge(['class' => 'btn btn-danger'], $attributes)) }}
{!! Form::close() !!}
