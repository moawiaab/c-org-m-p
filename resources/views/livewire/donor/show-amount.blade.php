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

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                       
                        <th>
                            {{ trans('cruds.shek.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.shek.fields.user') }}
                        </th>

                        
                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($dolar as $d)
                    <tr>
                      
                        <td>
                            {{ $d->unit_amount }}
                        </td>
                        <td>
                            {{ $d->amount }}
                        </td>

                        <td>
                            {{ $d->amount * $d->unit_amount}}
                        </td>
                        <td>
                            @if($d->bank)
                            <span class="badge badge-relationship">{{ $d->bank->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($d->user)
                            <span class="badge badge-relationship">{{ $d->user->name ?? '' }}</span>
                            @endif
                        </td>
                                      
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>