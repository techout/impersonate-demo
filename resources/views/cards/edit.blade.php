@extends('main')

@section('title', ' | Create Card')

@section('content')
    <h1>Update Card</h1>

    {!! Form::model($card, ['route' => ['cards.update', $card->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
        {{Form::TextGroup('name', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::JSColor('color', null, null, ['required' => ''], $card->color)}}

        {{Form::submit('Update Card', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}

    {{ Form::DestroyBtn('cards.destroy', $card->id) }}
@endsection

@push('js')
    {{Html::script('/js/jscolor.js')}}
@endPush