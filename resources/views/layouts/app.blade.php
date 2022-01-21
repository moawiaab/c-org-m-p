<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
    <link rel="stylesheet"
    href="{{ asset('admin-let/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/img.css') }}" />
    @if (Config::get('app.locale') == 'ar')
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/custom.css') }}">
    @endif
    <title>{{ __('panel.site_title') }}</title>
</head>

<body class="text-blueGray-700 bg-blueGray-100 antialiased">
    <main>
        @yield('content')
    </main>
    {{-- @yield('scripts') --}}
    @stack('scripts')
</body>

</html>