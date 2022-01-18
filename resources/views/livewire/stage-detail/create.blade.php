<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('stageDetail.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.stageDetail.fields.stage') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="stageDetail.name">
            <div class="validation-message">
                {{ $errors->first('stageDetail.name') }}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('stageDetail.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="details">{{ trans('cruds.stageDetail.fields.details') }}</label>
        <div class="col-sm-8">
        <textarea class="form-control" name="details" id="details" wire:model.defer="stageDetail.details"
            rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('stageDetail.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stageDetail.fields.details_helper') }}
        </div>
    </div></div>



    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
                <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
            </button>
            <button
                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button" onclick="Livewire.emit('closeModal')">
                Close
            </button>
        </div>
    </div>
</form>