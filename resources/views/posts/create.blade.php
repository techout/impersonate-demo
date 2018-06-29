@extends('main')

@section('title', ' | Create Post')

@section('css')
    {!!Html::style('css/parsley.css')!!}
    {!!Html::style('css/select2.min.css')!!}
@endsection

@section('content')
    <h1>Create New Post</h1>
    <hr>

    {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
        {{Form::TextGroup('title', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::TextGroup('slug', null, null, null, ['required' => '', 'minLength' => '5', 'maxlength' => '255'])}}

        {{Form::SelectGroup('category_id', 'Category', $categories, 'id', 'name')}}

        {{Form::label('tags', 'Tags:')}}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        {{Form::FileGroup('featured_image', 'Upload Image')}}

        {{Form::TextAreaGroup('body', null, null, null, ['required' => ''])}}

        {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}
@endsection

@section('js')
    {!!Html::script('js/parsley.min.js')!!}
    {!!Html::script('js/select2.min.js')!!}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>

    {!!Html::script('https://cloud.tinymce.com/stable/tinymce.min.js')!!}
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists link',
            menubar: false
        });
    </script>

@endsection