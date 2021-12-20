<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('permission.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="permission.title">
        <div class="validation-message">
            {{ $errors->first('permission.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permission.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.permission.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="permission.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('permission.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permission.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.permission.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="permission.br_id" />
        <div class="validation-message">
            {{ $errors->first('permission.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.br_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>