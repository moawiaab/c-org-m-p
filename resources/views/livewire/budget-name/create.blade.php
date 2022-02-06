<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group  row{{ $errors->has('budgetName.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.budgetName.fields.name') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="budgetName.name">
            <div class="validation-message">
                {{ $errors->first('budgetName.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budgetName.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group  row{{ $errors->has('budgetName.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.budgetName.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" wire:model.defer="budgetName.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('budgetName.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budgetName.fields.details_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group  row {{ $errors->has('budgetName.type') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2">{{ trans('cruds.budgetName.fields.type') }}</label>
        <div class="col-sm-8">
            @foreach ($this->listsForFields['type'] as $key => $value)
            <label class="radio-label"><input type="radio" name="type" wire:model="budgetName.type"
                    value="{{ $key }}">{{ $value }}</label> <br>
            @endforeach
            <div class="validation-message">
                {{ $errors->first('budgetName.type') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budgetName.fields.type_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group  row {{ $errors->has('budgetName.status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2">{{ trans('cruds.budgetName.fields.status') }}</label>
        <div class="col-sm-8">
            @foreach ($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="budgetName.status"
                    value="{{ $key }}">{{ $value }}</label> <br>
            @endforeach
            <div class="validation-message">
                {{ $errors->first('budgetName.status') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budgetName.fields.status_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
                <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
            </button>
            <a href="{{ route('admin.budget-names.index') }}" class="btn btn-sm bg-gradient-danger">
                <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
            </a>
        </div>
    </div>
</form>