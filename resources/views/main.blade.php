<!doctype html>
<html lang="en">
  <head>
    @include('partials._head')

    @include('partials._css')
  </head>
  <body>
    @include('partials._nav')

    <main class="container" role="main">
        @include('partials._messages')

        @yield('content')
        
        @include('partials._footer')
    </main>

    @include('partials._js')
  </body>
</html>
