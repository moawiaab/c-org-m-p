@extends('layouts.app')

@section('content')
<div class="pt-3">
    <img src="{{$img['url']}}" alt="" srcset="">
    <table class="table table-view">
        <tbody class="bg-white w-full">
            <tr>
                <th>
                    {{ trans('cruds.ratification.fields.id') }}
                </th>
                <td colspan="3">
                    {{ $ratification->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.shek.fields.project') }}
                </th>
                <td colspan="3">
                    @if ($ratification->project)
                    {{ $ratification->project->name ?? '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.expense.fields.amount') }}
                </th>
                <td colspan="3">
                    {{ $ratification->amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.text_amount') }}
                </th>
                <td colspan="3">
                    {{ $ratification->amount_text }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.beneficiary') }}
                </th>
                <td colspan="3">
                    {{ $ratification->beneficiary }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.ratification.fields.details') }}
                </th>
                <td colspan="3">
                    {{ $ratification->details }}
                </td>
            </tr>


            <tr>
                <th>
                    {{ trans('cruds.shek.fields.bank') }}
                </th>
                <td>
                    @if($shek->bank)
                    {{ $shek->bank->name ?? '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.shek.fields.shek_number') }}
                </th>
                <td>
                    {{ $shek->shek_number }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.shek.fields.entry_date') }}
                </th>
                <td>
                    {{ $shek->entry_date }}
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.ratification.fields.user') }}
                </th>
                <td colspan="3">
                    @if ($ratification->user)
                    {{ $ratification->user->name ?? '' }}
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
    <table class="table-img">
        {{-- <tr>
            <th>
                {{ trans('cruds.ratification.fields.administrative') }}
            </th>
            <td>
                @if ($ratification->administrative)
                : {{ $ratification->administrative->name ?? '' }}
                @endif
            </td>
            <td>
                التوقيع :
            </td>

            <td>

            </td>
        </tr> --}}

        <tr>
            <th>
                {{ trans('cruds.ratification.fields.executive') }}
            </th>
            <td>
                @if ($ratification->executive)
                : {{ $ratification->executive->name ?? '' }}
                @endif
            </td>

            <td>
                التوقيع :
            </td>

            <td>

            </td>
        </tr>


        <tr>
            <th>
                {{ trans('cruds.ratification.fields.financial') }}
            </th>
            <td>
                @if ($ratification->financial)
                : {{ $ratification->financial->name ?? '' }}
                @endif
            </td>
            <td>
                التوقيع :
            </td>

            <td>

            </td>
        </tr>
        <tr>

            <th>
                {{ trans('cruds.ratification.fields.accountant') }}
            </th>
            <td>
                @if ($ratification->accountant)
                : {{ $ratification->accountant->name ?? '' }}
                @endif
            </td>
            <td>
                التوقيع :
            </td>

            <td>

            </td>
        </tr>
    </table>
</div>
@endsection

@push('scripts')
<script>
    
    window.onload = (event) => this.print();
    window.addEventListener('afterprint', (event) =>  history.back() );
</script>
@endpush