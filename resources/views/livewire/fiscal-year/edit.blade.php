<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('fiscalYear.status') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2l">{{ trans('cruds.fiscalYear.fields.status') }}</label>
        @foreach ($this->listsForFields['status'] as $key => $value)
        <label class="radio-label"><input type="radio" name="status" wire:model="fiscalYear.status"
                value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('fiscalYear.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fiscalYear.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('fiscalYear.date') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="date">{{ trans('cruds.fiscalYear.fields.date') }}</label>
        <div class="col-sm-10">
            <x-date-picker class="form-control" wire:model="fiscalYear.date" id="date" name="date" picker="date" />
            <div class="validation-message">
                {{ $errors->first('fiscalYear.date') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.fiscalYear.fields.date_helper') }}
            </div>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
                <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
            </button>
            <a href="{{ route('admin.fiscal-years.index') }}" class="btn btn-sm bg-gradient-danger">
                <i class="fas fa-times  mr-2 text-white"> {{ trans('global.cancel') }} </i>
            </a>
        </div>
    </div>
</form>