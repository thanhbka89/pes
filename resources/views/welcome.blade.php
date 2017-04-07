<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">

        <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif            
        </div>
        <div id="app">
          <!-- Sử dụng component Example.vue -->
          <example></example>
        </div>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
