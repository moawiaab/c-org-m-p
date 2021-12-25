<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('expense.bud_name_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="budget">{{ trans('cruds.expense.fields.budget') }}</label>
        <div class="col-sm-10">
            @if ($expense->stage != 'New')
                <x-select-list class="form-control" id="budget" name="budget"
                    :options="$this->listsForFields['budget']" wire:model="expense.bud_name_id" disabled />
            @else
                <x-select-list class="form-control" id="budget" name="budget"
                    :options="$this->listsForFields['budget']" wire:model="expense.bud_name_id" />
            @endif

            <div class="validation-message">
                {{ $errors->first('expense.bud_name_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.budget_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('expense.amount') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="expense.amount"
                @if ($expense->stage != 'new') disabled @endif step="0.01">
            <div class="validation-message">
                {{ $errors->first('expense.amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.amount_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('expense.text_amount') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required"
            for="text_amount">{{ trans('cruds.expense.fields.text_amount') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="text_amount" id="text_amount" required
                wire:model.defer="expense.text_amount">
            <div class="validation-message">
                {{ $errors->first('expense.text_amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.text_amount_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('expense.beneficiary') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required"
            for="beneficiary">{{ trans('cruds.expense.fields.beneficiary') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="beneficiary" id="beneficiary" required
                wire:model.defer="expense.beneficiary" @if ($expense->stage != 'new') disabled @endif>
            <div class="validation-message">
                {{ $errors->first('expense.beneficiary') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.beneficiary_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('expense.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required"
            for="details">{{ trans('cruds.expense.fields.details') }}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="details" id="details" required wire:model.defer="expense.details"
                rows="4" @if ($expense->stage != 'new') disabled @endif></textarea>
            <div class="validation-message">
                {{ $errors->first('expense.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.details_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('expense.feeding') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="feeding">{{ trans('cruds.expense.fields.feeding') }}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="feeding" id="feeding" wire:model.defer="expense.feeding"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('expense.feeding') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.feeding_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('mediaCollections.expense_invoice') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="invoice">{{ trans('cruds.expense.fields.invoice') }}</label>
        <div class="col-sm-10">
            <x-dropzone id="invoice" name="invoice" action="{{ route('admin.expenses.storeMedia') }}"
                collection-name="expense_invoice" max-file-size="2" max-width="4096" max-height="4096" />
            <div class="validation-message">
                {{ $errors->first('mediaCollections.expense_invoice') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.expense.fields.invoice_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.expenses.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>
