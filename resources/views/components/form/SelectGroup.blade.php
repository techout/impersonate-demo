<div class="form-group">
    {{Form::label($name, $label, ['class' => 'control-label'])}}
    <select id="{{$name}}" name="{{$name}}" class="form-control">
        @foreach($items as $item)
            <option value="{{$item[$key]}}">{{$item[$value]}}</option>
        @endforeach
    </select>
    <small>{{$description}}</small>

    {{-- {{Form::label($name, $label, ['class' => 'control-label'])}}
    {{Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes))}} --}}
</div>
