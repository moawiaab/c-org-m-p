<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('shek.expense_id') ? 'invalid' : '' }}">
        <label class="form-label" for="expense">{{ trans('cruds.shek.fields.expense') }}</label>
        <x-select-list class="form-control" id="expense" name="expense" :options="$this->listsForFields['expense']" wire:model="shek.expense_id" />
        <div class="validation-message">
            {{ $errors->first('shek.expense_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.expense_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.project_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project">{{ trans('cruds.shek.fields.project') }}</label>
        <x-select-list class="form-control" id="project" name="project" :options="$this->listsForFields['project']" wire:model="shek.project_id" />
        <div class="validation-message">
            {{ $errors->first('shek.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.shek.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="shek.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('shek.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.bank_id') ? 'invalid' : '' }}">
        <label class="form-label" for="bank">{{ trans('cruds.shek.fields.bank') }}</label>
        <x-select-list class="form-control" id="bank" name="bank" :options="$this->listsForFields['bank']" wire:model="shek.bank_id" />
        <div class="validation-message">
            {{ $errors->first('shek.bank_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.bank_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.shek_number') ? 'invalid' : '' }}">
        <label class="form-label" for="shek_number">{{ trans('cruds.shek.fields.shek_number') }}</label>
        <input class="form-control" type="text" name="shek_number" id="shek_number" wire:model.defer="shek.shek_number">
        <div class="validation-message">
            {{ $errors->first('shek.shek_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.shek_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.entry_date') ? 'invalid' : '' }}">
        <label class="form-label" for="entry_date">{{ trans('cruds.shek.fields.entry_date') }}</label>
        <x-date-picker class="form-control" wire:model="shek.entry_date" id="entry_date" name="entry_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('shek.entry_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.entry_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shek.amount_text') ? 'invalid' : '' }}">
        <label class="form-label" for="amount_text">{{ trans('cruds.shek.fields.amount_text') }}</label>
        <input class="form-control" type="text" name="amount_text" id="amount_text" wire:model.defer="shek.amount_text">
        <div class="validation-message">
            {{ $errors->first('shek.amount_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shek.fields.amount_text_helper') }}
        </div>
    </div>

    <div class="form-group">
         <div class="col-sm-2"></div>
        <div class="col-sm-8">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.sheks.index') }}" class="btn btn-sm bg-gradient-danger">
                    <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
                </a>
            </div>
        </div>
</form>