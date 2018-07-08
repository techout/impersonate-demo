<div class="form-group">
    {{Form::label($name, $label, ['class' => 'control-label'])}}
    {{Form::text($name, $value, array_merge(['class' => 'form-control jscolor', 'data-jscolor' => '{hash:true}'], $attributes))}}
    <small>{{$description}}</small>
</div>