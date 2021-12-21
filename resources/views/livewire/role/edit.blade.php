<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('role.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.role.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="role.title">
        <div class="validation-message">
            {{ $errors->first('role.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permissions') ? 'invalid' : '' }}">
        <label class="form-label required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
        <x-select-list class="form-control" required id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />
        <div class="validation-message">
            {{ $errors->first('permissions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.permissions_helper') }}
        </div>
    </div>


    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>