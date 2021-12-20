<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('budget.budget_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="budget">{{ trans('cruds.budget.fields.budget') }}</label>
        <x-select-list class="form-control" required id="budget" name="budget" :options="$this->listsForFields['budget']" wire:model="budget.budget_id" />
        <div class="validation-message">
            {{ $errors->first('budget.budget_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.budget_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.budget.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="budget.br_id" />
        <div class="validation-message">
            {{ $errors->first('budget.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.budget.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="budget.user_id" />
        <div class="validation-message">
            {{ $errors->first('budget.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.fiscal_year_id') ? 'invalid' : '' }}">
        <label class="form-label" for="fiscal_year">{{ trans('cruds.budget.fields.fiscal_year') }}</label>
        <x-select-list class="form-control" id="fiscal_year" name="fiscal_year" :options="$this->listsForFields['fiscal_year']" wire:model="budget.fiscal_year_id" />
        <div class="validation-message">
            {{ $errors->first('budget.fiscal_year_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.fiscal_year_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.budget.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="budget.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('budget.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.expense_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="expense_amount">{{ trans('cruds.budget.fields.expense_amount') }}</label>
        <input class="form-control" type="number" name="expense_amount" id="expense_amount" wire:model.defer="budget.expense_amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('budget.expense_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.budget.fields.expense_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('budget.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.budget.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="budget.status" value="{{ $key }}">{{ $value }}</label>
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
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>