<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.app = <?php echo json_encode([
            'csrfToken' => csrf_token()
        ]); ?>
    </script>

    @stack('head')
</head>
<body>

    <section class="container-fluid p-0">
        <div class="row no-gutters" style="min-height: 100vh;">
            <div class="col-lg-6 col-md-6 col-12 m-0">
                @if($return)
                    @if(in_array(url()->previous(), [route('login'), route('register')]))
                    <a href="{{route('home')}}" class="btn-back-thin cursor-pointer"></a>
                    @else
                    <span onclick="goBack()" class="btn-back-thin cursor-pointer"></span>
                    @endif
                @endif

                @yield('content-left')                

            </div>
            <div class="col-lg-6 col-md-6 col-12">

                @yield('content-right')

            </div>
        </div>
    </section>

    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        function goBack(steps = 1) {
            window.history.go(steps*-1);
        }
    </script>
    @stack('js')
</body>
</html>
