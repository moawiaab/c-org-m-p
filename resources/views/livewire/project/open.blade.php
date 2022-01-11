<div>
    <x-header-model title="open {{$project->name}}" />
    <div class="relative p-6 flex-auto ">
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
            {{ $project->details}}
        </p>
    </div>
    <form wire:submit.prevent="submit" class="pt-3">

        
        <div class="flex items-center justify-end  border-t border-solid border-blueGray-200 rounded-b">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>

        </div>
    </form>
</div>