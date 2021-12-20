<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('ctiy.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.ctiy.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="ctiy.name">
        <div class="validation-message">
            {{ $errors->first('ctiy.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ctiy.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ctiy.country_id') ? 'invalid' : '' }}">
        <label class="form-label" for="country">{{ trans('cruds.ctiy.fields.country') }}</label>
        <x-select-list class="form-control" id="country" name="country" :options="$this->listsForFields['country']" wire:model="ctiy.country_id" />
        <div class="validation-message">
            {{ $errors->first('ctiy.country_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ctiy.fields.country_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ctiys.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>