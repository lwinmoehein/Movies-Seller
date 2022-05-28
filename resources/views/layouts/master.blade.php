<html>

<head>
    <title>{{config('app.name')}}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('favicon.png')}}"/>

    @stack('scripts')

</head>

<body class="app">
    <header class="page-header">
        @include('layouts.nav')
    </header>
    <section class="page-content">
        @yield('content')
    </section>
</body>

</html>
