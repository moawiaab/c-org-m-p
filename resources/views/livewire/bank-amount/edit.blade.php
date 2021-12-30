<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('bankAmount.bank_from_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="bank_from">{{ trans('cruds.bankAmount.fields.bank_from') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="bank_from" name="bank_from"
                :options="$this->listsForFields['bank_from']" wire:model="bankAmount.bank_from_id" />
            <div class="validation-message">
                {{ $errors->first('bankAmount.bank_from_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bankAmount.fields.bank_from_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('bankAmount.bank_to_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="bank_to">{{ trans('cruds.bankAmount.fields.bank_to') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="bank_to" name="bank_to" :options="$this->listsForFields['bank_to']"
                wire:model="bankAmount.bank_to_id" />
            <div class="validation-message">
                {{ $errors->first('bankAmount.bank_to_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bankAmount.fields.bank_to_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('bankAmount.amount') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="amount">{{ trans('cruds.bankAmount.fields.amount') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="bankAmount.amount"
                step="0.01">
            <div class="validation-message">
                {{ $errors->first('bankAmount.amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bankAmount.fields.amount_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('bankAmount.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.bankAmount.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" wire:model.defer="bankAmount.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('bankAmount.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bankAmount.fields.details_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.bank-amounts.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>