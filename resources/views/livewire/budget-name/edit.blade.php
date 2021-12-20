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
   

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.budget-names.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>