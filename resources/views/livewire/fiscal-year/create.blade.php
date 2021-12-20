<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('fiscalYear.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.fiscalYear.fields.amount') }}</label>
        <input class="form-control" type="text" name="amount" id="amount" wire:model.defer="fiscalYear.amount">
        <div class="validation-message">
            {{ $errors->first('fiscalYear.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fiscalYear.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.fiscalYear.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="fiscalYear.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('fiscalYear.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fiscalYear.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.fiscalYear.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="fiscalYear.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('fiscalYear.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fiscalYear.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.fiscalYear.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="fiscalYear.br_id" />
        <div class="validation-message">
            {{ $errors->first('fiscalYear.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fiscalYear.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.fiscalYear.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="fiscalYear.user_id" />
        <div class="validation-message">
            {{ $errors->first('fiscalYear.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.fiscal-years.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>