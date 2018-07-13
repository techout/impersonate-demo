@extends('main')

@section('title', ' | Update Card')

@push('css')
    <style>
        table input{
            height: 100%;
            width: 100%;
            border: 0;
        }
    </style>
@endPush

@section('content')
    <div class="float-right">{{ Form::DestroyBtn('cards.destroy', $card->id) }}</div>

    <h2>Update Card</h2>

    {!! Form::model($card, ['route' => ['cards.update', $card->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
        {{Form::TextGroup('name', null, null, null, ['required' => '', 'maxlength' => '255'])}}

        {{Form::JSColor('bg', 'Background Color', null, ['required' => '', 'BWTarget' => '#font'], $card->bg)}}

        <div class="form-group">
            <label>Font Color</label>
            <input type="text" id="font" class="form-control" style="background: #000000" disabled>
            <small>calculated by "Background Color"</small>
        </div>

        <div class="form-group">
            {{Form::label('links', 'Links')}}
            <div class="float-right"><button type="button" class="btn btn-sm btn-success dt-addRow"><i class="fas fa-plus-circle"></i></button></div>
            <table class="table table-sm dataTable" id="cardLinks">
                <thead>
                    <tr>
                        <th>Sort By</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($card->cardLinks as $cardLink)
                    <tr>
                        <td><input type="text" name="cardLinks[sort_by][]" value="{{$cardLink->sort_by}}"></td>
                        <td><input type="text" name="cardLinks[name][]" value="{{$cardLink->name}}"></td>
                        <td><input type="text" name="cardLinks[url][]" value="{{$cardLink->url}}"></td>
                        <td><button type="button" class="btn btn-sm btn-danger dt-rowRemove"><i class="fas fa-minus-circle"></i></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{Form::submit('Update Card', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 20px;'])}}
    {!! Form::close() !!}
@endsection

@push('js_imports')
    @include('inc.js.jscolor')
@endPush

@push('js')
<script>
    $(document).ready(function(){
        var table = $('table#cardLinks');
        if(!table.length) return false;
        if($.fn.DataTable.isDataTable(table)) table.DataTable().destroy();
        
        table.DataTable({
            dom: 'tp'
        });

        $('button.dt-addRow').on('click', function(){
            $table = $(this).closest('div.form-group').find('table');
            if(!$table.length) return false;

            $table.DataTable().row.add([
                '<input type="text" name="cardLinks[sort_by][]">',
                '<input type="text" name="cardLinks[name][]">',
                '<input type="text" name="cardLinks[url][]">',
                '<button type="button" class="btn btn-sm btn-danger dt-rowRemove"><i class="fas fa-minus-circle"></i></button>'
            ]).draw(false);
        });
    });
</script>
@endPush
