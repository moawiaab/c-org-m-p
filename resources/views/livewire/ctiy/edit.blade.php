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
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.ctiys.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>