<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('budgetName.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.budgetName.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="budgetName.name">
        <div class="validation-message">
            {{ $errors->first('budgetName.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budgetName.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.budgetName.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="budgetName.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('budgetName.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budgetName.type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.budgetName.fields.type') }}</label>
        @foreach($this->listsForFields['type'] as $key => $value)
            <label class="radio-label"><input type="radio" name="type" wire:model="budgetName.type" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('budgetName.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budgetName.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.budgetName.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="budgetName.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('budgetName.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budgetName.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.budgetName.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="budgetName.br_id" />
        <div class="validation-message">
            {{ $errors->first('budgetName.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budgetName.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.budgetName.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="budgetName.user_id" />
        <div class="validation-message">
            {{ $errors->first('budgetName.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budgetName.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.budget-names.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>