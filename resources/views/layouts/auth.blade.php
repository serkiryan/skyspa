<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Authorization</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-light container-fluid">
      <header class="row bg-danger text-white">
        <h1 class="col-3 offset-3">Authorization</h1>
        @auth
        <a href="{{ route('logout', app()->getLocale()) }}" class="btn-sm btn-success"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endauth
      </header>
      <section class="row">
        @yield('content')
      </section>
      <footer class="footer row p-3 mt-1 bg-dark text-white">
        
      </footer>
      <script src="{{ asset('js/app.js') }}"></script>
      <script type="text/javascript">
      </script>
  </body>
</html>
