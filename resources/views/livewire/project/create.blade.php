<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.project.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="project.name">
        <div class="validation-message">
            {{ $errors->first('project.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.details') ? 'invalid' : '' }}">
        <label class="form-label required" for="details">{{ trans('cruds.project.fields.details') }}</label>
        <textarea class="form-control" name="details" id="details" required wire:model.defer="project.details" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('project.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.all_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="all_amount">{{ trans('cruds.project.fields.all_amount') }}</label>
        <input class="form-control" type="number" name="all_amount" id="all_amount" wire:model.defer="project.all_amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('project.all_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.all_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.administrative_ratio') ? 'invalid' : '' }}">
        <label class="form-label" for="administrative_ratio">{{ trans('cruds.project.fields.administrative_ratio') }}</label>
        <input class="form-control" type="number" name="administrative_ratio" id="administrative_ratio" wire:model.defer="project.administrative_ratio" step="0.01">
        <div class="validation-message">
            {{ $errors->first('project.administrative_ratio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.administrative_ratio_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.ratio') ? 'invalid' : '' }}">
        <label class="form-label" for="ratio">{{ trans('cruds.project.fields.ratio') }}</label>
        <input class="form-control" type="number" name="ratio" id="ratio" wire:model.defer="project.ratio" step="0.01">
        <div class="validation-message">
            {{ $errors->first('project.ratio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.ratio_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.beneficiaries_number') ? 'invalid' : '' }}">
        <label class="form-label" for="beneficiaries_number">{{ trans('cruds.project.fields.beneficiaries_number') }}</label>
        <input class="form-control" type="number" name="beneficiaries_number" id="beneficiaries_number" wire:model.defer="project.beneficiaries_number" step="1">
        <div class="validation-message">
            {{ $errors->first('project.beneficiaries_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.beneficiaries_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.project_department_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project_department">{{ trans('cruds.project.fields.project_department') }}</label>
        <x-select-list class="form-control" id="project_department" name="project_department" :options="$this->listsForFields['project_department']" wire:model="project.project_department_id" />
        <div class="validation-message">
            {{ $errors->first('project.project_department_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_department_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.project_branch_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project_branch">{{ trans('cruds.project.fields.project_branch') }}</label>
        <x-select-list class="form-control" id="project_branch" name="project_branch" :options="$this->listsForFields['project_branch']" wire:model="project.project_branch_id" />
        <div class="validation-message">
            {{ $errors->first('project.project_branch_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_branch_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.donor_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="donor">{{ trans('cruds.project.fields.donor') }}</label>
        <x-select-list class="form-control" required id="donor" name="donor" :options="$this->listsForFields['donor']" wire:model="project.donor_id" />
        <div class="validation-message">
            {{ $errors->first('project.donor_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.donor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.project.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.country_id') ? 'invalid' : '' }}">
        <label class="form-label" for="country">{{ trans('cruds.project.fields.country') }}</label>
        <x-select-list class="form-control" id="country" name="country" :options="$this->listsForFields['country']" wire:model="project.country_id" />
        <div class="validation-message">
            {{ $errors->first('project.country_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.country_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.city_id') ? 'invalid' : '' }}">
        <label class="form-label" for="city">{{ trans('cruds.project.fields.city') }}</label>
        <x-select-list class="form-control" id="city" name="city" :options="$this->listsForFields['city']" wire:model="project.city_id" />
        <div class="validation-message">
            {{ $errors->first('project.city_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.area_id') ? 'invalid' : '' }}">
        <label class="form-label" for="area">{{ trans('cruds.project.fields.area') }}</label>
        <x-select-list class="form-control" id="area" name="area" :options="$this->listsForFields['area']" wire:model="project.area_id" />
        <div class="validation-message">
            {{ $errors->first('project.area_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.area_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.project.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="project.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('project.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>