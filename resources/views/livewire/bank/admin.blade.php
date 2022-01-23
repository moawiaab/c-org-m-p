<div>
    <x-header-model title="open {{@$donor->name}}" />
    <div class="pt-3">
        <table class="table table-view">
            <tbody class="bg-white">
                <tr>
                    <th>
                        {{ trans('cruds.donor.title_singular') }}
                    </th>
                    <td>
                        {{ @$amount->donor->name }}
                    </td>

                    <th>
                        {{ trans('cruds.bank.title_singular') }}
                    </th>
                    <td colspan="2">
                        {{ @$amount->bank->name }}
                    </td>

                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.donor.fields.amount') }}
                    </th>
                    <td>
                        {{ @$amount->amount }}
                    </td>

                    <th>
                        {{ trans('cruds.donor.fields.amount') }}
                    </th>
                    <td colspan="2">
                        {{ @$amount->teg_amount }}
                    </td>

                </tr>

                <tr>
                    <th>
                        {{ trans('cruds.project.fields.details') }}
                    </th>
                    <td colspan="4">
                        {{ @$amount->details }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="form-group row {{ $errors->has('dolar.amount') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2 required" for="shek_number">{{ trans('cruds.shek.fields.amount') }}</label>
            <div class="col-sm-8">
                <input class="form-control" type="number" name="shek_number" id="shek_number"
                    wire:model.defer="dolar.amount" required min="3"
                    placeholder="{{ trans('cruds.shek.fields.amount') }}" max="{{$amount->amount - $amount->teg_amount}}">
                <div class="validation-message">
                    {{ $errors->first('dolar.amount') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.shek.fields.shek_number_helper') }}
                </div>
            </div>
        </div>

        <div class="form-group row {{ $errors->has('dolar.unit_amount') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2 required" for="shek_number">{{ trans('cruds.shek.fields.unit_amount') }}</label>
            <div class="col-sm-8">
                <input class="form-control" type="number" name="shek_number" id="shek_number"
                    wire:model.defer="dolar.unit_amount" required min="3"
                    placeholder="{{ trans('cruds.shek.fields.unit_amount') }}">
                <div class="validation-message">
                    {{ $errors->first('dolar.unit_amount') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.shek.fields.shek_number_helper') }}
                </div>
            </div>
        </div>


        <div class="form-group row {{ $errors->has('dolar.details') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2 required" for="feedback">{{ trans('cruds.ratification.fields.feedback')
                }}</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="feedback" id="feedback" wire:model.defer="dolar.details"
                    rows="2"></textarea>
                <div class="validation-message">
                    {{ $errors->first('dolar.details') }}
                </div>
         
            </div>
        </div>

        <div class="form-group row {{ $errors->has('dolar.bank_id') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2 required" for="project_branch">{{ trans('cruds.bank.title_singular')
                }}</label>
            <div class="col-sm-8">

                <select class="form-control" name="project_branch" id="project_branch" wire:model="dolar.bank_id" required>
                    <option value=""></option>
                    @foreach ($this->listsForFields['bank'] as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                    @endforeach
                </select>
                <div class="validation-message">
                    {{ $errors->first('dolar.bank_id') }}
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