<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
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
    @yield('scripts')
</body>

</html>