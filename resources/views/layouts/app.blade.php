<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Home</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-light container-fluid">
      <header class="row bg-info text-white">
        <h2 class="col-2 offset-3">{{$user->name}}</h2>
        <div class="btn-group col-3" role="group" aria-label="Basic example">
          <a href="{{route('user')}}" class="btn btn-lg btn-primary">Контакты</a>
          <a href="{{route('contacts')}}" class="btn btn-lg btn-primary">Управление</a>
          <a href="{{route('history')}}" class="btn btn-lg btn-primary">История</a>
        </div>
        <div class="col-1 offset-1">
          @auth
          <a href="{{ route('logout', app()->getLocale()) }}" class="btn btn-lg btn-success"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              Выйти
          </a>
          <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          @endauth
        </div>
      </header>
      <section class="row">
      <article class="col-6 offset-3">
        @yield('content')
      </article>
      </section>
      <footer class="footer row p-3 mt-1 bg-dark text-white">
        
      </footer>
      <script src="{{ asset('js/app.js') }}"></script>
      <script type="text/javascript">
        var user_id = {{$user->id}}
      </script>
  </body>
</html>
