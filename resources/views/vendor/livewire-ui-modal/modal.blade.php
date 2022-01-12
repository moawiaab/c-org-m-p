<div>
    @isset($jsPath)
    <script>
        {!! file_get_contents($jsPath) !!}
    </script>
    @endisset
    @isset($cssPath)
    <style>
        {
             ! ! file_get_contents($cssPath) ! !
        }
    </style>
    @endisset

    <div x-data="LivewireUIModal()" x-init="init()" x-on:close.stop="show = false"
        x-on:keydown.escape.window="closeModalOnEscape()"
        x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
        x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
        class="fixed inset-0 z-10 overflow-y-auto" style="display: none;">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-10 text-center md:block md:p-0 z-10000">
            <div x-show="show" x-on:click="closeModalOnClickAway()" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 transition-all transform">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden md:inline-block md:align-middle md:h-screen" aria-hidden="true">&#8203;</span>
            <!--header-->

            <div x-show="show && showActiveComponent" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:scale-95" x-bind:class="modalWidth"
                class="relative p-6 flex-auto inline-block w-full align-content-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all md:my-8 md:align-middle md:w-full">
                @forelse($components as $id => $component)
                <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                    @livewire($component['name'], $component['attributes'], key($id))
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>