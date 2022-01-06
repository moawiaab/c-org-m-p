<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('stageDetail.stage_id') ? 'invalid' : '' }}">
        <label class="form-label" for="stage">{{ trans('cruds.stageDetail.fields.stage') }}</label>
        <x-select-list class="form-control" id="stage" name="stage" :options="$this->listsForFields['stage']" wire:model="stageDetail.stage_id" />
        <div class="validation-message">
            {{ $errors->first('stageDetail.stage_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.stage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stageDetail.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.stageDetail.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="stageDetail.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('stageDetail.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stageDetail.feedback') ? 'invalid' : '' }}">
        <label class="form-label" for="feedback">{{ trans('cruds.stageDetail.fields.feedback') }}</label>
        <textarea class="form-control" name="feedback" id="feedback" wire:model.defer="stageDetail.feedback" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('stageDetail.feedback') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.feedback_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.stage_detail_images') ? 'invalid' : '' }}">
        <label class="form-label" for="images">{{ trans('cruds.stageDetail.fields.images') }}</label>
        <x-dropzone id="images" name="images" action="{{ route('admin.stage-details.storeMedia') }}" collection-name="stage_detail_images" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.stage_detail_images') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.images_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stageDetail.project_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project">{{ trans('cruds.stageDetail.fields.project') }}</label>
        <x-select-list class="form-control" id="project" name="project" :options="$this->listsForFields['project']" wire:model="stageDetail.project_id" />
        <div class="validation-message">
            {{ $errors->first('stageDetail.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.project_helper') }}
        </div>
    </div>

    <div class="form-group">
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.stage-details.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>