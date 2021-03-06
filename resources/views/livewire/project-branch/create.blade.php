<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group  row{{ $errors->has('projectBranch.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.projectBranch.fields.name') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" required
                wire:model.defer="projectBranch.name">
            <div class="validation-message">
                {{ $errors->first('projectBranch.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectBranch.fields.name_helper') }}
            </div>

        </div>
    </div>
    <div class="form-group  row{{ $errors->has('projectBranch.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.projectBranch.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" wire:model.defer="projectBranch.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('projectBranch.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectBranch.fields.details_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group  row{{ $errors->has('projectBranch.proj_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="proj">{{ trans('cruds.projectBranch.fields.proj') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="proj" name="proj" :options="$this->listsForFields['proj']"
                wire:model="projectBranch.proj_id" />
            <div class="validation-message">
                {{ $errors->first('projectBranch.proj_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectBranch.fields.proj_helper') }}
            </div>
        </div>
    </div>
    {{-- <div class="form-group  row{{ $errors->has('projectBranch.user_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="user">{{ trans('cruds.projectBranch.fields.user') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']"
                wire:model="projectBranch.user_id" />
            <div class="validation-message">
                {{ $errors->first('projectBranch.user_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectBranch.fields.user_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group  row{{ $errors->has('projectBranch.br_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="br">{{ trans('cruds.projectBranch.fields.br') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']"
                wire:model="projectBranch.br_id" />
            <div class="validation-message">
                {{ $errors->first('projectBranch.br_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.projectBranch.fields.br_helper') }}
            </div>
        </div>
    </div> --}}

    <div class="form-group">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.project-branches.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>