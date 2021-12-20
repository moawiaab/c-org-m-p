<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('treasury.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.treasury.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="treasury.name">
        <div class="validation-message">
            {{ $errors->first('treasury.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.treasury.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.treasuries.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>