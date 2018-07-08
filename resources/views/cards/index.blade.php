@extends('main')

@section('title', ' | RYHome')

@section('content')
    <div class="row">
        @foreach($cards as $card)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background-color: {{$card->color}};">{{$card->name}}</div>
                    <div class="card-body">
                        @foreach($card->cardLinks as $cardLink)
                            <h6><a href="{{$cardLink->url}}">{{$cardLink->name}}</a></h6>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
