
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item {{Request::is('blog') ? 'active' : ''}}"><a class="nav-link" href="/blog">Blog</a></li>
            <li class="nav-item {{Request::is('about') ? 'active' : ''}}"><a class="nav-link" href="/about">About</a></li>
            <li class="nav-item {{Request::is('contact') ? 'active' : ''}}"><a class="nav-link" href="/contact">Contact</a></li>
        </ul>

        <ul class="navbar-nav">
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

            @else
                <div class="btn-group btn-sm">
                    @impersonating
                        <a href="{{route('impersonate.leave')}}" class="btn btn-secondary btn-sm">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-user-secret"></i>
                                <i class="fas fa-ban fa-2x" data-fa-transform="left-3" style="color:Tomato"></i>
                            </span>
                            <span class="sr-only">Leave Impersonate</span>
                        </a>
                    @else
                        <a href="" id="ImpersonateButton" class="btn btn-secondary btn-sm" role="button" data-toggle="modal" data-target="#impersonate_modal">
                            <i class="fas fa-user-secret"></i>
                            <span class="sr-only">Impersonate User</span>
                        </a>
                    @endImpersonating
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Item</a>
                        <a href="#" class="dropdown-item">Item</a>
                        <a href="#" class="dropdown-item">Item</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Item</a>
                    </div>
                </div>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                    <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                    <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
                    <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
                    <div class="dropdown-divider"></div>
                    {!!Form::open(['route' => 'logout', 'method' => 'POST'])!!}
                        {{Form::submit('Logout', ['class' => 'btn dropdown-item'])}}
                    {!!Form::close()!!}
                    </div>
                </li>
            @endguest
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
    </div>
</nav>


@section('js')
    <script>
        $(document).ready(function(){
            $('#ImpersonateButton').click(function(){
                $.ajax({
                    method: 'GET',
                    url: '/api/users',
                    success: function(data){
                        var new_row, dest = $('tbody#ImpersonateModal');
                        if(!dest.length) return false;
                        dest.html('');

                        $.each(data, function(k, v){
                            new_row = '<tr>';

                            new_row += '<td>' + data[k]['id'] + '</td>';
                            new_row += '<td><a href="impersonate/take/' + data[k]['id'] + '" class="btn btn-default">' + data[k]['name'] + '</a></td>';
                            new_row += '<td>' + data[k]['email'] + '</td>';
                            
                            new_row += '</tr>';

                            dest.append(new_row);
                        });
                    }
                });
            });
        });
    </script>
@endsection