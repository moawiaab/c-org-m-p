<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('projectStage.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.projectStage.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="projectStage.name">
        <div class="validation-message">
            {{ $errors->first('projectStage.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.projectStage.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" wire:model.defer="projectStage.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('projectStage.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.projectStage.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="projectStage.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('projectStage.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.start_date') ? 'invalid' : '' }}">
        <label class="form-label" for="start_date">{{ trans('cruds.projectStage.fields.start_date') }}</label>
        <x-date-picker class="form-control" wire:model="projectStage.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('projectStage.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.projectStage.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="projectStage.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('projectStage.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.projectStage.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="projectStage.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('projectStage.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.project_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project">{{ trans('cruds.projectStage.fields.project') }}</label>
        <x-select-list class="form-control" id="project" name="project" :options="$this->listsForFields['project']" wire:model="projectStage.project_id" />
        <div class="validation-message">
            {{ $errors->first('projectStage.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.projectStage.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.br_id') ? 'invalid' : '' }}">
        <label class="form-label" for="br">{{ trans('cruds.projectStage.fields.br') }}</label>
        <x-select-list class="form-control" id="br" name="br" :options="$this->listsForFields['br']" wire:model="projectStage.br_id" />
        <div class="validation-message">
            {{ $errors->first('projectStage.br_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.br_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectStage.user_created_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_created">{{ trans('cruds.projectStage.fields.user_created') }}</label>
        <x-select-list class="form-control" id="user_created" name="user_created" :options="$this->listsForFields['user_created']" wire:model="projectStage.user_created_id" />
        <div class="validation-message">
            {{ $errors->first('projectStage.user_created_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectStage.fields.user_created_helper') }}
        </div>
    </div>

    <div class="form-group">
       <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
             <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
        </button>
        <a href="{{ route('admin.project-stages.index') }}" class="btn btn-sm bg-gradient-danger">
           <i class="fas fa-times  mr-2 text-white">  {{ trans('global.cancel') }} </i>
        </a>
    </div>
</form>