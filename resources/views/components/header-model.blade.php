<div class="flex items-start justify-between border-b border-solid border-blueGray-200 rounded-t">
    <h3 class="text-2xl font-semibold">
        {{ $attributes['title'] }}
    </h3>
    <button
        class="p-1  bg-transparent border-0 text-black opacity-5 @if (Config::get('app.locale') == 'ar')  float-left @endif text-xl leading-none font-semibold outline-none focus:outline-none"
        onclick="Livewire.emit('closeModal')">
        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
        </span>
    </button>
</div>