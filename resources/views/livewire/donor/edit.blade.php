<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('donor.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.donor.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="donor.name">
        <div class="validation-message">
            {{ $errors->first('donor.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.donor.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="donor.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('donor.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.donor.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="donor.phone">
        <div class="validation-message">
            {{ $errors->first('donor.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.donor.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="donor.email">
        <div class="validation-message">
            {{ $errors->first('donor.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.donor.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="donor.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('donor.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.donor.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="donor.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('donor.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.donor.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="donor.br_id" />
        <div class="validation-message">
            {{ $errors->first('donor.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donor.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.donor.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="donor.user_id" />
        <div class="validation-message">
            {{ $errors->first('donor.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.donor.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.donors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>