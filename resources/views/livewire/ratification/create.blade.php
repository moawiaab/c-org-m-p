<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('ratification.project_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project">{{ trans('cruds.ratification.fields.project') }}</label>
        <x-select-list class="form-control" id="project" name="project" :options="$this->listsForFields['project']" wire:model="ratification.project_id" />
        <div class="validation-message">
            {{ $errors->first('ratification.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.project_stage_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project_stage">{{ trans('cruds.ratification.fields.project_stage') }}</label>
        <x-select-list class="form-control" id="project_stage" name="project_stage" :options="$this->listsForFields['project_stage']" wire:model="ratification.project_stage_id" />
        <div class="validation-message">
            {{ $errors->first('ratification.project_stage_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.project_stage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.ratification.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="ratification.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('ratification.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.amount_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount_text">{{ trans('cruds.ratification.fields.amount_text') }}</label>
        <input class="form-control" type="text" name="amount_text" id="amount_text" required wire:model.defer="ratification.amount_text">
        <div class="validation-message">
            {{ $errors->first('ratification.amount_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.amount_text_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.beneficiary') ? 'invalid' : '' }}">
        <label class="form-label required" for="beneficiary">{{ trans('cruds.ratification.fields.beneficiary') }}</label>
        <input class="form-control" type="text" name="beneficiary" id="beneficiary" required wire:model.defer="ratification.beneficiary">
        <div class="validation-message">
            {{ $errors->first('ratification.beneficiary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.beneficiary_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.details') ? 'invalid' : '' }}">
        <label class="form-label required" for="details">{{ trans('cruds.ratification.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" required wire:model.defer="ratification.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('ratification.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.ratification_invoices') ? 'invalid' : '' }}">
        <label class="form-label required" for="invoices">{{ trans('cruds.ratification.fields.invoices') }}</label>
        <x-dropzone id="invoices" name="invoices" action="{{ route('admin.ratifications.storeMedia') }}" collection-name="ratification_invoices" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.ratification_invoices') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.invoices_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.ratification.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="ratification.user_id" />
        <div class="validation-message">
            {{ $errors->first('ratification.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.ratification.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="ratification.br_id" />
        <div class="validation-message">
            {{ $errors->first('ratification.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.stage') ? 'invalid' : '' }}">
        <label class="form-label" for="stage">{{ trans('cruds.ratification.fields.stage') }}</label>
        <input class="form-control" type="number" name="stage" id="stage" wire:model.defer="ratification.stage" step="1">
        <div class="validation-message">
            {{ $errors->first('ratification.stage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.stage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ratification.feedback') ? 'invalid' : '' }}">
        <label class="form-label" for="feedback">{{ trans('cruds.ratification.fields.feedback') }}</label>
        <textarea class="form-control" name="feedback" id="feedback" wire:model.defer="ratification.feedback" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('ratification.feedback') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ratification.fields.feedback_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ratifications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>