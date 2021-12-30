<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('bank.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.bank.fields.name') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="bank.name">
            <div class="validation-message">
                {{ $errors->first('bank.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bank.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('bank.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="details">{{ trans('cruds.bank.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" wire:model.defer="bank.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('bank.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bank.fields.details_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('bank.number') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="number">{{ trans('cruds.bank.fields.number') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="number" id="number" wire:model.defer="bank.number">
            <div class="validation-message">
                {{ $errors->first('bank.number') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bank.fields.number_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('bank.status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2">{{ trans('cruds.bank.fields.status') }}</label>
        <div class="col-sm-8">
            @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="bank.status" value="{{ $key }}">{{
                $value }}</label>

            @endforeach
            <div class="validation-message">
                {{ $errors->first('bank.status') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.bank.fields.status_helper') }}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
            <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.banks.index') }}" class="btn btn-sm bg-gradient-danger">
            <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>