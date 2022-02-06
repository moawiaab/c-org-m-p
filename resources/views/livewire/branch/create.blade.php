<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('branch.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.branch.fields.name') }}</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="branch.name">
        <div class="validation-message">
            {{ $errors->first('branch.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.name_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group row {{ $errors->has('branch.address') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="address">{{ trans('cruds.branch.fields.address') }}</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="address" id="address" wire:model.defer="branch.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('branch.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.address_helper') }}
        </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('branch.email') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="email">{{ trans('cruds.branch.fields.email') }}</label>
        <div class="col-sm-10">
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="branch.email">
        <div class="validation-message">
            {{ $errors->first('branch.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.email_helper') }}
        </div>
    </div>
    </div>
    <div class="form-group row {{ $errors->has('branch.phone') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="phone">{{ trans('cruds.branch.fields.phone') }}</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="branch.phone">
        <div class="validation-message">
            {{ $errors->first('branch.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.phone_helper') }}
        </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('branch.status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2">{{ trans('cruds.branch.fields.status') }}</label>
        <div class="col-sm-10">
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="branch.status" value="{{ $key }}"> {{ $value }} </label><br>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('branch.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.status_helper') }}
        </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('mediaCollections.branch_logo') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="logo">{{ trans('cruds.branch.fields.logo') }}</label>
        <div class="col-sm-10">
        <x-dropzone id="logo" name="logo" action="{{ route('admin.branches.storeMedia') }}" collection-name="branch_logo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.branch_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.branch.fields.logo_helper') }}
        </div>
    </div>
    </div>

    <div class="form-group row">
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.branches.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>