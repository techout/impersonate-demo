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
                @impersonating
                    <a href="{{route('impersonate.leave')}}" class="btn btn-success">Leave Impersonate</a>
                @else
                    <a href="{{route('impersonate', 2)}}" class="btn btn-primary">Impersonate User</a>
                @endImpersonating

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