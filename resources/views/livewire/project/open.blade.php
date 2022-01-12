<div>
    <x-header-model title="open {{$project->name}}" />
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
            {{ $this->modalMaxWidth()}}
        </p>
    <form wire:submit.prevent="submit" class="pt-3">


        <div class="flex items-center justify-end pt-3 border-t border-solid border-blueGray-200 rounded-b">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>

        </div>
    </form>
</div>