<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.home') }}" class="nav-link"> {{ trans('global.dashboard') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav @if (Config::get('app.locale') == 'ar') mr-auto-navbav @else ml-auto  @endif">
        @if (file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
        <li class="nav-item dropdown">
            <livewire:language-switcher />
        </li>
        @endif
        {{-- <li class="inline-block relative">
            <a class="nav-link" onclick="openDropdown(event,'nav-notification-dropdown')">
                <i class="fas fa-bell"></i>
                @if ($new_alert_count = auth()->user()->alerts()->wherePivot('seen_at', null)->count())
                <span
                    class="absolute -top-1 text-xs font-semibold inline-flex rounded-full h-5 min-w-5 text-white bg-indigo-600 leading-5 justify-center">
                    <span class="px-1">{{ $new_alert_count }}</span>
                </span>
                @endif
            </a>
            <div id="nav-notification-dropdown" data-popper-placement="bottom-start"
                class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 hidden"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(617px, 58px);">
                @forelse(auth()->user()->alerts()->latest()->take(10)->get() as $alert)
                @if ($alert->link)
                <a href="{{ $alert->link }}" target="_blank"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 cursor-pointer {{ $alert->pivot->seen_at ? 'text-blueGray-400' : 'text-blueGray-700' }}">
                    <i class="fas fa-link fa-fw mr-1"></i>
                    {{ $alert->message }}
                </a>
                @else
                <a
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 cursor-pointer {{ $alert->pivot->seen_at ? 'text-blueGray-400' : 'text-blueGray-700' }}">
                    <i class="fas fa-bell fa-fw mr-1"></i>
                    {{ $alert->message }}
                </a>
                @endif
                @empty
                {{ __('global.no_alerts') }}
                @endforelse
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>

