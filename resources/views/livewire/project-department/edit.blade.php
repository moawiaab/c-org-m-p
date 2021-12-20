<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('projectDepartment.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.projectDepartment.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="projectDepartment.name">
        <div class="validation-message">
            {{ $errors->first('projectDepartment.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDepartment.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDepartment.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.projectDepartment.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="projectDepartment.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('projectDepartment.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDepartment.fields.details_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.project-departments.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>