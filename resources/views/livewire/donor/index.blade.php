<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('donor_delete')
                <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Donor" format="csv" />
                <livewire:excel-export model="Donor" format="xlsx" />
                <livewire:excel-export model="Donor" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            <input type="text" wire:model.debounce.300ms="search" class="inline-block form-control" placeholder="{{ trans('global.search') }}"/>
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.donor.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        <th>
                            {{ trans('cruds.donor.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donors as $donor)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $donor->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $donor->id }}
                            </td>
                            <td>
                                {{ $donor->name }}
                            </td>
                            <td>
                                {{ $donor->details }}
                            </td>
                            <td>
                                {{ $donor->phone }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $donor->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $donor->email }}
                                </a>
                            </td>
                            <td>
                                {{ $donor->address }}
                            </td>
                            <td>
                                {{ $donor->amount }}
                            </td>
                            <td>
                                @if($donor->br)
                                    <span class="badge badge-relationship">{{ $donor->br->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($donor->user)
                                    <span class="badge badge-relationship">{{ $donor->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('donor_show')
                                        <a class="btn btn-sm  mr-2" href="{{ route('admin.donors.show', $donor) }}">
                                            <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                        </a>
                                    @endcan
                                    @can('donor_edit')
                                        <a class="btn btn-sm mr-2" href="{{ route('admin.donors.edit', $donor) }}">
                                            <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    @endcan
                                    @can('donor_delete')
                                        <button class="btn btn-sm mr-2" type="button" wire:click="deleteConfirm( {{ $donor->id }})" wire:loading.attr="disabled">
                                            <i class="far fa-trash-alt text-danger" title="{{ trans('global.delete') }}"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $donors->links() }}
        </div>
    </div>
</div>

@push('scripts')
  <x-delete />
    <x-deleteAll />
@endpush