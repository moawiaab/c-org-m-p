<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('role.title') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="title">{{ trans('cruds.role.fields.title') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="title" id="title" required wire:model.defer="role.title">
            <div class="validation-message">
                {{ $errors->first('role.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.role.fields.title_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('permissions') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required"
            for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
        <div class="col-sm-10">
            <x-select-list class="form-control" required id="permissions" name="permissions" wire:model="permissions"
                :options="$this->listsForFields['permissions']" multiple />
            <div class="validation-message">
                {{ $errors->first('permissions') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.role.fields.permissions_helper') }}
            </div>
        </div>
    </div>
    @if (auth()->user()->br_id == 1)
        <div class="form-group row {{ $errors->has('role.br_id') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="br">{{ trans('cruds.role.fields.br') }}</label>
            <div class="col-sm-10">
                <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']"
                    wire:model="role.br_id" />
                <div class="validation-message">
                    {{ $errors->first('role.br_id') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.role.fields.br_helper') }}
                </div>
            </div>
        </div>
    @endif
    <div class="form-group row">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>
