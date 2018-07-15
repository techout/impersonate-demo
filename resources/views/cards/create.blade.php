@extends('main')

@section('title', ' | Create Card')

@section('content')
    <h1>Create Card</h1>

    {!! Form::open(['route' => 'cards.store', 'data-parsley-validate' => '']) !!}
        {{Form::TextGroup('name', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::JSColor('bg', 'Background Color', null, ['required' => '', 'BWTarget' => '#fcolor'])}}

        {{Form::TextGroup('fcolor', 'Font Color', 'calculated by the "Background Color"', null, ['readonly' => 'readonly'])}}

        {{Form::submit('Create Card', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}
@endsection

@push('js_imports')
    @include('inc.js.jscolor')
@endPush
