<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row{{ $errors->has('budget.budget_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="budget">{{ trans('cruds.budget.fields.budget') }}</label>
        <div class="col-sm-10">
            <x-select-list class="form-control" required id="budget" name="budget"
                :options="$this->listsForFields['budget']" wire:model="budget.budget_id" disabled />
            <div class="validation-message">
                {{ $errors->first('budget.budget_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budget.fields.budget_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row{{ $errors->has('budget.amount') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="amount">{{ trans('cruds.budget.fields.amount') }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="amount" id="amount" required
                wire:model.defer="budget.amount" step="0.01">
            <div class="validation-message">
                {{ $errors->first('budget.amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.budget.fields.amount_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2">{{ trans('cruds.budget.fields.status') }}</label>
        @foreach ($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="budget.status"
                    value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('budget.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.budgets.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>
