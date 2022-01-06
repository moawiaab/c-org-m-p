<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('projectStage.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="name">{{ trans('cruds.projectStage.fields.name') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" wire:model.defer="projectStage.name">
            <div class="validation-message">
                {{ $errors->first('projectStage.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectStage.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('projectStage.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.projectStage.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" wire:model.defer="projectStage.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('projectStage.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectStage.fields.details_helper') }}
            </div>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
                <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
            </button>
            <a href="{{ route('admin.project-stages.index') }}" class="btn btn-sm bg-gradient-danger">
                <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
            </a>
        </div>
    </div>
</form>