@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            {!! Form::open(['url' => url('contact'), 'method' => 'POST']) !!}
                {{Form::TextGroup('email')}}

                {{Form::TextGroup('subject')}}

                {{Form::TextAreaGroup('message')}}

                {{Form::submit('Send Message', ['class' => 'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection