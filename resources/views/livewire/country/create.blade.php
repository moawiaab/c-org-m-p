<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('country.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.country.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="country.name">
        <div class="validation-message">
            {{ $errors->first('country.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('country.code') ? 'invalid' : '' }}">
        <label class="form-label required" for="code">{{ trans('cruds.country.fields.code') }}</label>
        <input class="form-control" type="text" name="code" id="code" required wire:model.defer="country.code">
        <div class="validation-message">
            {{ $errors->first('country.code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.code_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>