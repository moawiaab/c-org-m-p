<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('admin-let/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/adminlte.min.css') }}">
    @if (Config::get('app.locale') == 'ar')
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-let/dist/css/custom.css') }}">
    @endif

    <title>{{ trans('panel.site_title') }}</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <div id="app">
            <x-admin.nav />
            <x-admin.sidebar />
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            @yield('header')

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                @if (session('status'))
                <x-alert message="{{ session('status') }}" variant="indigo" role="alert" />
                @endif
                <!-- Main content -->
                <section class="content">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </section>
                <!-- /.content -->
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.1
                </div>
                <strong>Copyright &copy; 2022 <a href="https://github.com/moawiaab/c-org-m-p">moawiaab</a>.</strong> All rights
                reserved.  
                <small>Open source software for charitable organizations</small>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @if (Config::get('app.locale') == 'ar')
    <script src="{{ asset('admin-let/dist/js/bootstarp.rtl.js') }}"></script>
    @endif
    <script src="{{ asset('admin-let/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-let/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('admin-let/dist/js/demo.js') }}"></script>
    @livewire('livewire-ui-modal')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
    @yield('scripts')
    @stack('scripts')
    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }

        window.addEventListener('swal:alert', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.type,
                position: 'center',
                timer: 3000,
                toast: true,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false,
            })
        });
    </script>
</body>

</html>