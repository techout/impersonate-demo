@extends('main')

@section('title', ' | RYHome')

@section('content')
    <div class="row">
        @foreach($cards as $card)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background-color: {{$card->bg}}; color: {{$card->font}};">
                        <span>{{$card->name}}</span>
                        @permission(['Card-Edit', $card->id])
                            <div class="float-right">
                                <a href="{{route('cards.edit', $card->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                        @endpermission
                    </div>
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
