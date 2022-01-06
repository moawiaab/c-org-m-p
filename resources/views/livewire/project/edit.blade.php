<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group row {{ $errors->has('project.name') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="name">{{ trans('cruds.project.fields.name') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="project.name">
            <div class="validation-message">
                {{ $errors->first('project.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.name_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.details') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="details">{{ trans('cruds.project.fields.details') }}</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="details" id="details" required wire:model.defer="project.details"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('project.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.details_helper') }}
            </div>
        </div>
    </div>
    @if ($project->status == 2)

    <div class="form-group row {{ $errors->has('project.all_amount') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="all_amount">{{ trans('cruds.project.fields.all_amount')
            }}</label>
        <div class="col-sm-4">
            <input class="form-control" type="number" name="all_amount" id="all_amount"
                wire:model.defer="project.all_amount" step="0.01" wire:keyup="updateAmount" required>
            <div class="validation-message">
                {{ $errors->first('project.all_amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.all_amount_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.administrative_ratio') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="administrative_ratio">{{
            trans('cruds.project.fields.administrative_ratio') }}</label>
        <div class="col-sm-4">
            <input class="form-control" type="number" name="administrative_ratio" id="administrative_ratio"
                wire:model.defer="project.administrative_ratio" step="0.01" wire:keyup="updateAmount" required>
            <div class="validation-message">
                {{ $errors->first('project.administrative_ratio') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.administrative_ratio_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.ratio') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="ratio">{{ trans('cruds.project.fields.ratio') }}</label>
        <div class="col-sm-4">
            <input class="form-control" type="number" name="ratio" id="ratio" wire:model.defer="project.ratio"
                step="0.01" disabled>
            <div class="validation-message">
                {{ $errors->first('project.ratio') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.ratio_helper') }}
            </div>
        </div>
    </div>

    @endif
    <div class="form-group row {{ $errors->has('project.beneficiaries_number') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="beneficiaries_number">{{
            trans('cruds.project.fields.beneficiaries_number') }}</label>
        <div class="col-sm-8">
            <input class="form-control" type="number" name="beneficiaries_number" id="beneficiaries_number"
                wire:model.defer="project.beneficiaries_number" step="1">
            <div class="validation-message">
                {{ $errors->first('project.beneficiaries_number') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.beneficiaries_number_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('department') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="project_department">{{
            trans('cruds.project.fields.project_department') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="project_department" name="project_department"
                :options="$this->listsForFields['project_department']" wire:model="department" required />
            <div class="validation-message">
                {{ $errors->first('department') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.project_department_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.project_branch_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="project_branch">{{
            trans('cruds.project.fields.project_branch')
            }}</label>
        <div class="col-sm-8">
            {{--
            <x-select-list class="form-control" id="project_branch" name="project_branch"
                :options="$this->listsForFields['project_branch']" wire:model="project.project_branch_id" /> --}}

            <select class="form-control" name="project_branch" id="project_branch" wire:model="project_branch_id"
                required>
                <option value=""></option>
                @if (!is_null($project_branch))
                @foreach ($project_branch as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                @endif
            </select>
            <div class="validation-message">
                {{ $errors->first('project_branch_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.project_branch_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.donor_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2 required" for="donor">{{ trans('cruds.project.fields.donor') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" required id="donor" name="donor"
                :options="$this->listsForFields['donor']" wire:model="project.donor_id" />
            <div class="validation-message">
                {{ $errors->first('project.donor_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.donor_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="user">{{ trans('cruds.project.fields.user') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="user" name="user" wire:model="user"
                :options="$this->listsForFields['user']" multiple />
            <div class="validation-message">
                {{ $errors->first('user') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.user_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('country') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="country">{{ trans('cruds.project.fields.country') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="country" name="country" :options="$this->listsForFields['country']"
                wire:model="country" />
            <div class="validation-message">
                {{ $errors->first('country') }}
            </div>

            <div class="help-block">
                {{ trans('cruds.project.fields.country_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('project.city_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="cityid">{{ trans('cruds.project.fields.city') }}</label>
        <div class="col-sm-8">
            <select class="form-control" name="cityId" id="cityId" wire:model="cityId"
                aria-placeholder="{{ trans('cruds.project.fields.city') }}">
                {{-- <option value="">{{ trans('cruds.project.fields.city') }}</option> --}}
                @if (!is_null($city))
                @foreach ($city as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('project.city_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="cityid">{{ trans('cruds.project.fields.area') }}</label>
        <div class="col-sm-8">
            <select class="form-control" name="cityId" id="cityId" wire:model="area_id"
                aria-placeholder="{{ trans('cruds.project.fields.area') }}">
                {{-- <option value="">{{ trans('cruds.project.fields.area') }}</option> --}}
                @if (!is_null($area))
                @foreach ($area as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    {{-- <div class="form-group row {{ $errors->has('project.area_id') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="area">{{ trans('cruds.project.fields.area') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="area" name="area" :options="$this->area"
                wire:model="project.area_id" />
            <div class="validation-message">
                {{ $errors->first('project.area_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.area_helper') }}
            </div>
        </div>
    </div> --}}

    <div class="form-group row {{ $errors->has('phases') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="phases">{{ trans('cruds.project.fields.phases') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="phases" name="phases" wire:model="phases"
                :options="$this->listsForFields['phases']" multiple />
            <div class="validation-message">
                {{ $errors->first('phases') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.phases_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('partners') ? 'invalid' : '' }}">
        <label class="control-label col-sm-2" for="partners">{{ trans('cruds.project.fields.partners') }}</label>
        <div class="col-sm-8">
            <x-select-list class="form-control" id="partners" name="partners" wire:model="partners"
                :options="$this->listsForFields['partners']" multiple />
            <div class="validation-message">
                {{ $errors->first('partners') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.project.fields.partners_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </div>
</form>

@push('scripts')
<script>
    let amount = document.getElementById('all_amount');
        
function citys() {
    window.Livewire.emit('citys');
}       
</script>
@endpush