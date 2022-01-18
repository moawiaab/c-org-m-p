<div>
    <x-header-model title="open {{$project->name}}" />
    <div class="pt-3">
        <table class="table table-view">
            <tbody class="bg-white">
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.id') }}
                    </th>
                    <td>
                        {{ $project->id }}
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.name') }}
                    </th>
                    <td colspan="2">
                        {{ $project->name }}
                    </td>


                    <td>
                        {{ trans('cruds.project.fields.status') }} : {{ $project->status_label }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.details') }}
                    </th>
                    <td colspan="5">
                        {{ $project->details }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.all_amount') }}
                    </th>
                    <td>
                        {{ $project->all_amount }} => {{ $project->all_amount - $project->ratio}}
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.administrative_ratio') }}
                    </th>
                    <td>
                        {{ $project->administrative_ratio }}%
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.ratio') }}
                    </th>
                    <td>
                        {{ $project->ratio }}
                    </td>

                </tr>

                <tr>

                    <th>
                        {{ trans('cruds.project.fields.project_department') }}
                    </th>
                    <td>
                        @if($project->projectDepartment)
                        <span class="badge badge-relationship">{{ $project->projectDepartment->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.project_branch') }}
                    </th>
                    <td>
                        @if($project->projectBranch)
                        <span class="badge badge-relationship">{{ $project->projectBranch->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.beneficiaries_number') }}
                    </th>
                    <td>
                        {{ $project->beneficiaries_number }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.donor') }}
                    </th>
                    <td>
                        @if($project->donor)
                        <span class="badge badge-relationship">{{ $project->donor->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.phases') }}
                    </th>
                    <td colspan="4">
                        @foreach($project->phases as $key => $entry)
                        <span class="badge badge-relationship">{{ $entry->name }}</span>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.partners') }}
                    </th>
                    <td colspan="2">
                        @foreach($project->partners as $key => $entry)
                        @if ($entry->id !== $project->branch->id) {{ trans('cruds.project.fields.partners') }} : @else
                        {{ trans('cruds.project.fields.branch') }} : @endif
                        <span class="badge badge-relationship">{{ $entry->name }}</span> <br>
                        @endforeach
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.user') }}
                    </th>
                    <td colspan="2">
                        @foreach($project->user as $key => $entry)
                        {{ trans('cruds.project.fields.user') }} : <span class="badge badge-relationship">{{
                            $entry->name
                            }}</span> {{ trans('cruds.project.fields.branch') }} : <span
                            class="badge badge-relationship">{{
                            $entry->br->name }}</span> <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.country') }}
                    </th>
                    <td>
                        @if($project->country)
                        <span class="badge badge-relationship">{{ $project->country->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.city') }}
                    </th>
                    <td>
                        @if($project->city)
                        <span class="badge badge-relationship">{{ $project->city->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.area') }}
                    </th>
                    <td>
                        @if($project->area)
                        <span class="badge badge-relationship">{{ $project->area->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>


            </tbody>
        </table>
    </div>

    <form wire:submit.prevent="submit" class="pt-3">


        <div class="form-group row {{ $errors->has('projectDetail.details') ? 'invalid' : '' }}">
            <label class="control-label col-sm-3 required" for="details">{{ trans('cruds.project.fields.details')
                }}</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="details" id="details" required placeholder="{{ trans('cruds.project.fields.details')}}"
                    wire:model.defer="projectDetail.details" rows="2"></textarea>
                <div class="validation-message">
                    {{ $errors->first('projectDetail.details') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.project.fields.details_helper') }}
                </div>
            </div>
        </div>

        <div class="form-group row {{ $errors->has('projectDetail.place') ? 'invalid' : '' }}">
            <label class="control-label col-sm-3 required" for="place">{{ trans('cruds.project.fields.place')
                }}</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="place" id="place" required placeholder="{{ trans('cruds.project.fields.place')}}"
                    wire:model.defer="projectDetail.place" rows="2"></textarea>
                <div class="validation-message">
                    {{ $errors->first('projectDetail.place') }}
                </div>
            </div>
        </div>

        <div class="form-group row {{ $errors->has('projectDetail.longitude') ? 'invalid' : '' }}">
            <label class="control-label col-sm-3" for="longitude">{{ trans('cruds.project.fields.longitude') }}</label>
            <div class="col-sm-4">
                <input class="form-control" type="number" name="longitude" id="longitude" placeholder="{{ trans('cruds.project.fields.longitude')}}"
                    wire:model.defer="projectDetail.longitude">
                <div class="validation-message">
                    {{ $errors->first('projectDetail.longitude') }}
                </div>
            </div>
        </div>

        <div class="form-group row {{ $errors->has('projectDetail.latitude') ? 'invalid' : '' }}">
            <label class="control-label col-sm-3" for="latitude">{{ trans('cruds.project.fields.latitude') }}</label>
            <div class="col-sm-4">
                <input class="form-control" type="number" name="latitude" id="latitude" placeholder="{{ trans('cruds.project.fields.latitude')}}"
                    wire:model.defer="projectDetail.latitude">
                <div class="validation-message">
                    {{ $errors->first('projectDetail.latitude') }}
                </div>
            </div>
        </div>

        <div class="form-group row {{ $errors->has('projectDetail.beneficiary_category') ? 'invalid' : '' }}">
            <label class="control-label col-sm-3 required" for="beneficiary_category">{{ trans('cruds.project.fields.beneficiary_category') }}</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="beneficiary_category" id="beneficiary_category" placeholder="{{ trans('cruds.project.fields.beneficiary_category')}}"
                    wire:model.defer="projectDetail.beneficiary_category"  required>
                <div class="validation-message">
                    {{ $errors->first('projectDetail.beneficiary_category') }}
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end pt-3 border-t border-solid border-blueGray-200 rounded-b">
            <button
                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button" onclick="Livewire.emit('closeModal')">
                Close
            </button>
            <button class="btn btn-indigo btn-sm mr-2 outline-none" type="submit"> {{ trans('global.save') }} </button>
        </div>
    </form>
</div>