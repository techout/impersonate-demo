@extends('main')

@section('title', ' | Create Card')

@section('content')
    <h1>Create Card</h1>

    {!! Form::open(['route' => 'cards.store', 'data-parsley-validate' => '']) !!}
        {{Form::TextGroup('name', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::JSColor('bg', 'Background Color', null, ['required' => '', 'BWTarget' => '#font'])}}

        <div class="form-group">
            <label>Font Color</label>
            <input type="text" id="font" class="form-control" style="background: #000000" disabled>
            <small>calculated by "Background Color"</small>
        </div>

        {{Form::submit('Create Card', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}
@endsection

@push('js_imports')
    @include('inc.js.jscolor')
@endPush
