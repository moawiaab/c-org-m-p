<div>
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-globe-africa"></i>

    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @foreach($languages as $language)
            <a wire:click="changeLocale('{{ $language['short_code'] }}')" href="#" class="dropdown-item">
                {{ $language['title'] }}
            </a>
        @endforeach
    </div>
</div>
