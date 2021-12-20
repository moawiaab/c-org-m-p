<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('bank.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.bank.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="bank.name">
        <div class="validation-message">
            {{ $errors->first('bank.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.bank.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="bank.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('bank.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.number') ? 'invalid' : '' }}">
        <label class="form-label" for="number">{{ trans('cruds.bank.fields.number') }}</label>
        <input class="form-control" type="text" name="number" id="number" wire:model.defer="bank.number">
        <div class="validation-message">
            {{ $errors->first('bank.number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.bank.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="bank.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bank.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.amount_in') ? 'invalid' : '' }}">
        <label class="form-label" for="amount_in">{{ trans('cruds.bank.fields.amount_in') }}</label>
        <input class="form-control" type="number" name="amount_in" id="amount_in" wire:model.defer="bank.amount_in" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bank.amount_in') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.amount_in_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.amount_out') ? 'invalid' : '' }}">
        <label class="form-label" for="amount_out">{{ trans('cruds.bank.fields.amount_out') }}</label>
        <input class="form-control" type="number" name="amount_out" id="amount_out" wire:model.defer="bank.amount_out" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bank.amount_out') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.amount_out_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.bank.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="bank.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('bank.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bank.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.banks.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>