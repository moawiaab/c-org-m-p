<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            <div class="validation-message">
                {{ $errors->first('user.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
            <div class="validation-message">
                {{ $errors->first('user.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.email_helper') }}
            </div>
        </div>
    </div>
    {{-- <div class="form-group row {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
            <div class="validation-message">
                {{ $errors->first('user.password') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.password_helper') }}
            </div>
        </div>
    </div> --}}
    <div class="form-group row {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <div class="col-sm-10">
            <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles"
                :options="$this->listsForFields['roles']" multiple />
            <div class="validation-message">
                {{ $errors->first('roles') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.roles_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
            <div class="validation-message">
                {{ $errors->first('user.locale') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.locale_helper') }}
            </div>
        </div>
    </div>
    @if (auth()->user()->br_id == 1)
        <div class="form-group row {{ $errors->has('user.br_id') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="br">{{ trans('cruds.user.fields.br') }}</label>
            <div class="col-sm-10">
                <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']"
                    wire:model="user.br_id" />
                <div class="validation-message">
                    {{ $errors->first('user.br_id') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.br_helper') }}
                </div>
            </div>
        </div>
    @endif

    <div class="form-group row {{ $errors->has('status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="status">{{ trans('cruds.user.fields.status') }}</label>
        <div class="col-sm-10">
            <x-select-list class="form-control" required id="status" name="status" wire:model="user.status"
                :options="$this->listsForFields['status']" />
            <div class="validation-message">
                {{ $errors->first('status') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.status_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('user.phone') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="phone">{{ trans('cruds.user.fields.phone') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="user.phone">
            <div class="validation-message">
                {{ $errors->first('user.phone') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.phone_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('mediaCollections.user_avatar') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="avatar">{{ trans('cruds.user.fields.avatar') }}</label>
        <div class="col-sm-10">
            <x-dropzone id="avatar" name="avatar" action="{{ route('admin.users.storeMedia') }}"
                collection-name="user_avatar" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
            <div class="validation-message">
                {{ $errors->first('mediaCollections.user_avatar') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.avatar_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>
