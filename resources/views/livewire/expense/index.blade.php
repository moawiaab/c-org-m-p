<div>
    <div class="card-controls sm:flex row">
        <div class="w-full sm:w-1/2 col-md-6">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach ($paginationOptions as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('expense_delete')
            <button class="btn btn-sm ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button"
                wire:click="deleteAllConfirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ?
                '' : 'disabled' }}>
                <i class="far fa-trash-alt text-danger" title=" {{ __('Delete Selected') }}"></i>
            </button>
            @endcan

            @if (file_exists(app_path('Http/Livewire/ExcelExport.php')))
            <livewire:excel-export model="Expense" format="csv" />
            <livewire:excel-export model="Expense" format="xlsx" />
            <livewire:excel-export model="Expense" format="pdf" />
            @endif


            @can('expense_create')
            <x-csv-import route="{{ route('admin.expenses.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 col-md-6 sm:text-right">
            <input type="text" wire:model.debounce.300ms="search" class="inline-block form-control"
                placeholder="{{ trans('global.search') }}" />
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
                        {{-- <th class="w-28">
                            {{ trans('cruds.expense.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th> --}}
                        <th>
                            {{ trans('cruds.expense.fields.bud_name') }}
                            @include('components.table.sort', ['field' => 'bud_name.name'])
                        </th>
                        @if (auth()->user()->br_id == 1)
                        <th>
                            {{ trans('cruds.expense.fields.br') }}
                            @include('components.table.sort', ['field' => 'br.name'])
                        </th>
                        @endif
                        <th>
                            {{ trans('cruds.expense.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        {{-- <th>
                            {{ trans('cruds.expense.fields.text_amount') }}
                            @include('components.table.sort', ['field' => 'text_amount'])
                        </th> --}}
                        <th>
                            {{ trans('cruds.expense.fields.beneficiary') }}
                            @include('components.table.sort', ['field' => 'beneficiary'])
                        </th>
                        {{-- <th>
                            {{ trans('cruds.expense.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th> --}}

                        <th>
                            {{ trans('cruds.expense.fields.stage') }}
                            @include('components.table.sort', ['field' => 'stage'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.invoice') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $expense->id }}" wire:model="selected">
                        </td>
                        {{-- <td>
                            {{ $expense->id }}
                        </td> --}}
                        <td>
                            @if ($expense->budName)
                            <span class="badge badge-relationship">{{ $expense->budName->name ?? '' }}</span>
                            @endif
                        </td>
                        @if (auth()->user()->br_id == 1)
                        <td>
                            @if ($expense->br)
                            <span class="badge badge-relationship">{{ $expense->br->name ?? '' }}</span>
                            @endif
                        </td>
                        @endif
                        <td>
                            @if ($expense->user)
                            <span class="badge badge-relationship">{{ $expense->user->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $expense->amount }}
                        </td>
                        {{-- <td>
                            {{ $expense->text_amount }}
                        </td> --}}
                        <td>
                            {{ $expense->beneficiary }}
                        </td>

                        <td>
                            {{ $expense->stage }}
                        </td>
                        <td>
                            @foreach ($expense->invoice as $key => $entry)
                            <a class="link-photo" href="{{ $entry['url'] }}">
                                <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}"
                                    title="{{ $entry['name'] }}">
                            </a>
                            @endforeach
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('expense_show')
                                <a class="btn btn-sm  mr-2" href="{{ route('admin.expenses.show', $expense) }}">
                                    <i class="far fa-eye text-info" title="{{ trans('global.view') }}"></i>
                                </a>
                                @endcan
                                @can('expense_edit')
                                @if (auth()->user()->status === 1 && ($expense->stage === 'New' 
                                || $expense->stage == 'Executive' 
                                || $expense->stage == 'Financial')
                                || (auth()->id() === $expense->user_id && $expense->stage === 'New') 
                                || (auth()->user()->status === 2 && $expense->stage === 'Executive') 
                                || (auth()->user()->status === 3 && $expense->stage === 'Financial') 
                                || (auth()->user()->status === 4 && $expense->stage === 'New'))
                                <a class="btn btn-sm mr-2" href="{{ route('admin.expenses.edit', $expense) }}">
                                    <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
                                </a>
                                @endif

                                @endcan
                                @can('expense_delete')
                                @if (auth()->user()->status === 1 && ($expense->stage === 'New' 
                                || $expense->stage == 'Executive' 
                                || $expense->stage == 'Financial')
                                || (auth()->id() === $expense->user_id && $expense->stage == 'New')
                                || (auth()->user()->status === 2 && $expense->stage == 'Executive')
                                || (auth()->user()->status === 3 && $expense->stage == 'Financial')
                                || (auth()->user()->status === 4 && $expense->stage == 'New'))

                                <button class="btn btn-sm mr-2" type="button"
                                    wire:click="deleteConfirm( {{ $expense->id }})" wire:loading.attr="disabled">
                                    <i class="far fa-trash-alt text-danger" title="{{ trans('global.delete') }}"></i>
                                </button>
                                @endif
                                @endcan
                                @if (
                                (auth()->user()->status === 1  && ($expense->stage === 'New' 
                                || $expense->stage == 'Executive' 
                                || $expense->stage == 'Financial')
                                || (auth()->user()->status === 2 && $expense->stage == 'Executive')
                                || (auth()->user()->status === 3 && $expense->stage == 'Financial')
                                || (auth()->user()->status === 4 && $expense->stage == 'New')
                                ) && ($expense->stage != 'End'))
                                <button class="btn btn-sm mr-2" wire:click="$emit('postAdded', {{ $expense }})">
                                    <i class="fas fa-check text-success"></i>
                                </button>
                                @endif
                                @if ((auth()->user()->status === 1 || auth()->user()->status === 4) && $expense->stage
                                == 'End')
                                <button class="btn btn-sm mr-2" wire:click="$emit('postAdded', {{ $expense }})">
                                    <i class="fas fa-print text-info"></i>
                                </button>
                                @endif
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
            @if ($this->selectedCount)
            <p class="text-sm leading-5">
                <span class="font-medium">
                    {{ $this->selectedCount }}
                </span>
                {{ __('Entries selected') }}
            </p>
            @endif
            {{ $expenses->links() }}
        </div>
    </div>



    <form wire:submit.prevent="submit" class="pt-3">
        <div class="modal fade" id="modal-xl" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$stage}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group row">
                            <table class="table table-view">
                                <tbody class="bg-white">
                                    <tr>
                                        <th>
                                            {{ trans('cruds.expense.fields.created_at') }}
                                        </th>
                                        <td>
                                            {{ $created_at }}
                                        </td>


                                        <th>
                                            {{ trans('cruds.expense.fields.bud_name') }}
                                        </th>
                                        <td>
                                            @if ($budName)
                                            <span class="text-lightBlue-500">{{ $budName ?? '' }}</span>
                                            @endif
                                        </td>

                                    </tr>

                                    <tr>

                                        <th>
                                            {{ trans('cruds.expense.fields.beneficiary') }}
                                        </th>
                                        <td>
                                            {{ $beneficiary }}
                                        </td>
                                        <th>
                                            {{ trans('cruds.expense.fields.br') }}
                                        </th>
                                        <td>
                                            @if ($brach)
                                            <span class="text-primary">{{ $brach ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>

                                        <th>
                                            {{ trans('cruds.expense.fields.amount') }}
                                        </th>
                                        <td>
                                            {{ $amount }}
                                        </td>

                                        <th>
                                            {{ trans('cruds.expense.fields.text_amount') }}
                                        </th>
                                        <td>
                                            {{ $amount_text }}
                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            {{ trans('cruds.expense.fields.user') }}
                                        </th>
                                        <td>
                                            @if ($user)
                                            <span class="text-primary">{{ @$user ?? '' }}</span>
                                            @endif
                                        </td>

                                        <th>
                                            {{ trans('cruds.expense.fields.administrative') }}
                                        </th>
                                        <td>
                                            @if ($administrative)
                                            <span class="text-primary">{{ @$administrative ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.expense.fields.executive') }}
                                        </th>
                                        <td>
                                            @if ($executive)
                                            <span class="text-primary">{{ @$executive ?? '' }}</span>
                                            @endif
                                        </td>

                                        <th>
                                            {{ trans('cruds.expense.fields.financial') }}
                                        </th>
                                        <td>
                                            @if ($financial)
                                            <span class="text-primary">{{ @$financial ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row {{ $errors->has('expense.details') ? 'invalid' : '' }}">
                            <label class="control-label col-sm-2 required" for="details">{{
                                trans('cruds.expense.fields.details') }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="details" id="details" required
                                    wire:model.defer="expense.details" rows="4" @if($expense->stage != 'new')
                                     disabled @endif>
                                    </textarea>
                                <div class="validation-message">
                                    {{ $errors->first('expense.details') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.expense.fields.details_helper') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('expense.feeding') ? 'invalid' : '' }}">
                            <label class="control-label col-sm-2" for="feeding">{{ trans('cruds.expense.fields.feeding')
                                }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="feeding" id="feeding"
                                    wire:model.defer="expense.feeding" rows="4"></textarea>
                                <div class="validation-message">
                                    {{ $errors->first('expense.feeding') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.expense.fields.feeding_helper') }}
                                </div>
                            </div>
                        </div>

                        @if ($stage === 'End')
                        <div class="form-group row{{ $errors->has('bank_id') ? 'invalid' : '' }}">
                            <label class="control-label col-sm-2" for="bank">{{ trans('cruds.shek.fields.bank')
                                }}</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" wire:model.defer="bank_id" id="bank" name="bank" placeholder="{{ __('Select your option') }}" required>
                                    <option></option>
                                    @foreach($this->listsForFields['bank'] as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                {{ $errors->first('bank_id') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.shek.fields.bank_helper') }}
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('shek.shek_number') ? 'invalid' : '' }}">
                            <label class="control-label col-sm-2" for="shek_number">{{ trans('cruds.shek.fields.shek_number') }}</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="number" name="shek_number" id="shek_number" wire:model.defer="shek_number" required min="3" placeholder="{{ trans('cruds.shek.fields.shek_number') }}">
                            <div class="validation-message">
                                {{ $errors->first('shek_number') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.shek.fields.shek_number_helper') }}
                            </div>
                        </div>
                        </div>
                        <div class="form-group row{{ $errors->has('shek.entry_date') ? 'invalid' : '' }}">
                            <label class="control-label col-sm-2" for="entry_date">{{ trans('cruds.shek.fields.entry_date') }}</label>
                            <div class="col-sm-10">
                            {{-- <x-date-picker class="form-control" wire:model.defer="entry_date" id="entry_date" name="entry_date" picker="date"  required/> --}}
                            <input class="form-control" type="date"  wire:model.defer="entry_date" id="entry_date" name="entry_date" required>
                            <div class="validation-message">
                                {{ $errors->first('entry_date') }}
                            </div>
                            <div class="help-block">
                                {{ trans('cruds.shek.fields.entry_date_helper') }}
                            </div>
                        </div>
                        </div>
                        @endif

                    </div>

                    <div class="modal-footer justify-content-between">

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('global.close')
                            }}</button>
                        <button class="btn btn-primary" type="submit">{{ trans('global.save') }}</button>
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>

@push('scripts')
<x-delete />
<x-deleteAll />
<script>
    window.addEventListener('openModel', event => {
            event.detail.type ?
                $('#modal-xl').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                }) : $('#modal-xl').modal('hide');
        });
</script>
@endpush