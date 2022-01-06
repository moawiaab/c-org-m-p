<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('donor.name') ? 'invalid' : '' }}">
        <label class="control-label required col-sm-2" for="name">{{ trans('cruds.donor.fields.name') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="donor.name">
            <div class="validation-message">
                {{ $errors->first('donor.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.donor.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('donor.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.donor.fields.details') }}</label>
        <div class="col-sm-10">

            <textarea class="form-control" name="details" id="details" wire:model.defer="donor.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('donor.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.donor.fields.details_helper') }}
            </div>

        </div>
    </div>
    <div class="form-group row {{ $errors->has('donor.phone') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="phone">{{ trans('cruds.donor.fields.phone') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="donor.phone">
            <div class="validation-message">
                {{ $errors->first('donor.phone') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.donor.fields.phone_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('donor.email') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="email">{{ trans('cruds.donor.fields.email') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="email" name="email" id="email" required wire:model.defer="donor.email">
            <div class="validation-message">
                {{ $errors->first('donor.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.donor.fields.email_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('donor.address') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="address">{{ trans('cruds.donor.fields.address') }}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="address" id="address" wire:model.defer="donor.address"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('donor.address') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.donor.fields.address_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group">
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.donors.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>
