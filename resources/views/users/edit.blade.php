@extends('main')

@section('title', ' | User Edit')

@section('content')
    <h1>Edit User</h1>

    {!!Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT'])!!}

        {{Form::TextGroup('id', 'User ID', null, null, ['readonly' => 'readonly'])}}

        {{Form::SelectGroup('branch_id', null, $branches, 'id', 'symbol')}}

        {{Form::TextGroup('name')}}

        {{Form::TextGroup('email')}}

        {{Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
    {!!Form::close()!!}
@endsection

