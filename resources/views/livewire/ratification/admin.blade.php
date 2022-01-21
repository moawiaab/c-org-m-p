<div>
    <x-header-model title="open {{$ratification->project->name}}" />
    <div class="pt-3">
        <table class="table table-view">
            <tbody class="bg-white">
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.id') }}
                    </th>
                    <td>
                        {{ $ratification->id }}
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.name') }}
                    </th>
                    <td colspan="2">
                        {{ $ratification->project->name }}
                    </td>


                    <td>
                        {{ trans('cruds.project.fields.status') }} : {{ $ratification->stage_label }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.details') }}
                    </th>
                    <td colspan="5">
                        {{ $ratification->details }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.all_amount') }}
                    </th>
                    <td>
                        {{ $ratification->project->all_amount - $ratification->project->ratio}}
                    </td>


                    <th>
                        {{ trans('cruds.project.fields.expense_amount') }}
                    </th>
                    <td>
                        {{ $ratification->project->expense_amount }}
                    </td>

                    <th>
                        {{ trans('cruds.project.fields.reserved_amount') }}
                    </th>
                    <td>
                        {{ $ratification->project->reserved_amount }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.all_amount') }}
                    </th>
                    <td>
                        {{ $ratification->amount }}
                    </td>

                    <th>
                        {{ trans('cruds.ratification.fields.amount_text') }}
                    </th>
                    <td>
                        {{ $ratification->amount_text }}
                    </td>

                    <th>
                        {{ trans('cruds.ratification.fields.beneficiary') }}
                    </th>
                    <td>
                        {{ $ratification->beneficiary }}
                    </td>

                </tr>

                <tr>

                    <th>
                        {{ trans('cruds.ratification.fields.user') }}
                    </th>
                    <td>
                        @if($ratification->user)
                        <span class="badge badge-relationship">{{ $ratification->user->name ?? '' }}</span>
                        @endif
                    </td>

                    <th>
                        {{ trans('cruds.ratification.fields.executive') }}
                    </th>
                    <td>
                        @if($ratification->executive)
                        <span class="badge badge-relationship">{{ $ratification->executive->name ?? '' }}</span>
                        @endif
                    </td>
                    <th>
                        {{ trans('cruds.ratification.fields.financial') }}
                    </th>
                    <td>
                        @if($ratification->financial)
                        <span class="badge badge-relationship">{{ $ratification->financial->name ?? '' }}</span>
                        @endif
                    </td>
                </tr>

                {{-- <tr>
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
                </tr> --}}


            </tbody>
        </table>
    </div>

    <form wire:submit.prevent="submit" class="pt-3">

        @if ($ratification->stage === 3)
        <div class="form-group row{{ $errors->has('bank_id') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="bank">{{ trans('cruds.shek.fields.bank')
                }}</label>
            <div class="col-sm-10">
                <select class="select2 form-control" wire:model.defer="bank_id" id="bank" name="bank"
                    placeholder="{{ __('Select your option') }}" required>
                    <option></option>
                    @foreach($this->listsForFields['bank'] as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $errors->first('bank_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.shek.fields.bank_helper') }}
            </div>
        </div>

        <div class="form-group row {{ $errors->has('shek.shek_number') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="shek_number">{{ trans('cruds.shek.fields.shek_number') }}</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="shek_number" id="shek_number"
                    wire:model.defer="shek_number" required min="3"
                    placeholder="{{ trans('cruds.shek.fields.shek_number') }}">
                <div class="validation-message">
                    {{ $errors->first('shek_number') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.shek.fields.shek_number_helper') }}
                </div>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('shek.entry_date') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="entry_date">{{ trans('cruds.shek.fields.entry_date') }}</label>
            <div class="col-sm-10">
                {{--
                <x-date-picker class="form-control" wire:model.defer="entry_date" id="entry_date" name="entry_date"
                    picker="date" required /> --}}
                <input class="form-control" type="date" wire:model.defer="entry_date" id="entry_date" name="entry_date"
                    required>
                <div class="validation-message">
                    {{ $errors->first('entry_date') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.shek.fields.entry_date_helper') }}
                </div>
            </div>
        </div>
        @else

        <div class="form-group {{ $errors->has('ratification.amount') ? 'invalid' : '' }}">
            <label class="form-label required" for="amount">{{ trans('cruds.ratification.fields.amount') }}</label>
            <input class="form-control" type="number" name="amount" id="amount" required
                wire:model.defer="ratification.amount" step="0.01">
            <div class="validation-message">
                {{ $errors->first('ratification.amount') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.ratification.fields.amount_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('ratification.amount_text') ? 'invalid' : '' }}">
            <label class="form-label required" for="amount_text">{{ trans('cruds.ratification.fields.amount_text')
                }}</label>
            <input class="form-control" type="text" name="amount_text" id="amount_text" required
                wire:model.defer="ratification.amount_text">
            <div class="validation-message">
                {{ $errors->first('ratification.amount_text') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.ratification.fields.amount_text_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('ratification.details') ? 'invalid' : '' }}">
            <label class="form-label required" for="details">{{ trans('cruds.ratification.fields.details') }}</label>
            <textarea class="form-control" name="details" id="details" required wire:model.defer="ratification.details"
                rows="2"></textarea>
            <div class="validation-message">
                {{ $errors->first('ratification.details') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.ratification.fields.details_helper') }}
            </div>
        </div>

        <div class="form-group {{ $errors->has('ratification.feedback') ? 'invalid' : '' }}">
            <label class="form-label" for="feedback">{{ trans('cruds.ratification.fields.feedback') }}</label>
            <textarea class="form-control" name="feedback" id="feedback" wire:model.defer="ratification.feedback"
                rows="2"></textarea>
            <div class="validation-message">
                {{ $errors->first('ratification.feedback') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.ratification.fields.feedback_helper') }}
            </div>
        </div>
        @endif
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