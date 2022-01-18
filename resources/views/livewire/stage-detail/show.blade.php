<div>
    <style>
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }

        .toggle-checkbox:checked+.toggle-label {
            @apply: bg-green-400;
            background-color: #68D391;
        }
    </style>
    <x-header-model title=" {{ $this->stage }} " />
    <table class="table table-view">
        <tbody class="bg-white">
            <tr>
                <th>
                    {{ trans('cruds.project.fields.phases') }}
                </th>
                <td>
                    {{ $this->stage }}
                </td>

                <th>
                    {{ trans('cruds.project.fields.all_amount') }}
                </th>
                <td colspan="2">
                    {{ $this->amount }}
                </td>


                <td>
                    {{ trans('cruds.project.fields.status') }} : {{ $status ? 'open' : 'close' }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.project.fields.feeding') }}
                </th>
                <td colspan="5">
                    {{ $this->feeding }} {{$type}}
                </td>
            </tr>
        </tbody>
    </table>
    <form wire:submit.prevent="submit" class="pt-3">
        <div class="form-group row{{ $errors->has('status') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2">{{ trans('cruds.fiscalYear.fields.status') }}</label>
            <div class="col-sm-8">
                <label class="radio-label"><input type="radio" name="status" wire:model="status" value="1">open</label>
                <label class="radio-label"><input type="radio" name="status" wire:model="status" value="0">close</label>
                <div class="validation-message">
                    {{ $errors->first('status') }}
                </div>
            </div>

        </div>

        <div class="form-group row {{ $errors->has('stageDetail.feeding') ? 'invalid' : '' }}">
            <label class="control-label col-sm-2" for="feeding">{{ trans('cruds.project.fields.feeding') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="feeding" id="feeding" wire:model="feeding" rows="4"></textarea>

                <div class="validation-message">
                    {{ $errors->first('stageDetail.feeding') }}
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <button class="btn btn-sm bg-gradient-info mr-2" type="submit">
                    <i class="far fa-save mr-2 text-white"> {{ trans('global.save') }} </i>
                </button>
              
            </div>
        </div>
    </form>
</div>
</div>