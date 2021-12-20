<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('bankAmount.bank_from_id') ? 'invalid' : '' }}">
        <label class="form-label" for="bank_from">{{ trans('cruds.bankAmount.fields.bank_from') }}</label>
        <x-select-list class="form-control" id="bank_from" name="bank_from" :options="$this->listsForFields['bank_from']" wire:model="bankAmount.bank_from_id" />
        <div class="validation-message">
            {{ $errors->first('bankAmount.bank_from_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bankAmount.fields.bank_from_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bankAmount.bank_to_id') ? 'invalid' : '' }}">
        <label class="form-label" for="bank_to">{{ trans('cruds.bankAmount.fields.bank_to') }}</label>
        <x-select-list class="form-control" id="bank_to" name="bank_to" :options="$this->listsForFields['bank_to']" wire:model="bankAmount.bank_to_id" />
        <div class="validation-message">
            {{ $errors->first('bankAmount.bank_to_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bankAmount.fields.bank_to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bankAmount.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.bankAmount.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="bankAmount.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bankAmount.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bankAmount.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bankAmount.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.bankAmount.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="bankAmount.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('bankAmount.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bankAmount.fields.details_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bank-amounts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>