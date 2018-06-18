@extends('main')

@section('title', ' | Edit Post')

@section('css')
    {!!Html::style('css/parsley.css')!!}
    {!!Html::style('css/select2.min.css')!!}
@endsection

@section('content')
{!!Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true])!!}
    <div class="row">
        <div class="col-md-8">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', null, ['class' => 'form-control input-lg'])}}

            {{Form::label('slug', 'Slug:', ['class' => 'form-spacing-top'])}}
            {{Form::text('slug', null, ['class' => 'form-control'])}}

            {{Form::label('category_id', 'Category', ['class' => 'form-spacing-top'])}}
            {{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}

            {{Form::label('tags', 'Tags:', ['class' => 'form-spacing-top'])}}
            {{Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple'])}}

            {{Form::label('featured_image', 'Upload Featured Image:')}}
            {{Form::file('featured_image', ['class' => 'form-control'])}}

            {{Form::label('body', 'Body:', ['class' => 'form-spacing-top'])}}
            {{Form::textarea('body', null, ['class' => 'form-control'])}}
        </div>

        <div class="card col-md-4">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{Carbon::parse($post->created_at)->format('M j, Y h:ia')}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{Carbon::parse($post->updated_at)->format('M j, Y h:ia')}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!!Html::linkRoute('posts.index', 'Cancel', null, ['class' => 'btn btn-danger btn-block'])!!}
                    </div>
                    <div class="col-sm-6">
                        {!!Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
{!!Form::close()!!}
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
            plugins: 'lists link code',
            menubar: false
        });
    </script>
@endsection