@extends('main')

@section('title', ' | Create Card')

@section('content')
    <h1>Create Card</h1>

    {!! Form::open(['route' => 'cards.store', 'data-parsley-validate' => '']) !!}
        {{Form::TextGroup('name', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::JSColor('color', null, null, ['required' => ''])}}

        {{Form::submit('Create Card', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}
@endsection

@push('js_imports')
    {{Html::script('/js/jscolor.js')}}
@endPush
