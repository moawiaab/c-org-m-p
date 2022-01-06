<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('projectDepartment.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="name">{{ trans('cruds.projectDepartment.fields.name') }}</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="projectDepartment.name">
        <div class="validation-message">
            {{ $errors->first('projectDepartment.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDepartment.fields.name_helper') }}
        </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('projectDepartment.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.projectDepartment.fields.details') }}</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="details" id="details" wire:model.defer="projectDepartment.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('projectDepartment.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDepartment.fields.details_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group row">
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.project-departments.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>