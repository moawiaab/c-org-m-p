@extends('layouts.app')

@section('content')
<div class="pt-3">
    <img src="{{@$img['url']}}" alt="" srcset="">
    <table class="table table-view">
        <tbody class="bg-white w-full">
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.id') }}
                </th>
                <td colspan="3">
                    {{ $expense->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.bud_name') }}
                </th>
                <td colspan="3">
                    @if ($expense->budName)
                    {{ $expense->budName->name ?? '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.expense.fields.amount') }}
                </th>
                <td colspan="3">
                    {{ $expense->amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.text_amount') }}
                </th>
                <td colspan="3">
                    {{ $expense->text_amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.beneficiary') }}
                </th>
                <td colspan="3">
                    {{ $expense->beneficiary }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.expense.fields.details') }}
                </th>
                <td colspan="3">
                    {{ $expense->details }}
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
                    {{ trans('cruds.expense.fields.user') }}
                </th>
                <td colspan="3">
                    @if ($expense->user)
                    {{ $expense->user->name ?? '' }}
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
    <table class="table-img">
        <tr>
            <th>
                {{ trans('cruds.expense.fields.administrative') }}
            </th>
            <td>
                @if ($expense->administrative)
                : {{ $expense->administrative->name ?? '' }}
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
                {{ trans('cruds.expense.fields.executive') }}
            </th>
            <td>
                @if ($expense->executive)
                : {{ $expense->executive->name ?? '' }}
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
                {{ trans('cruds.expense.fields.financial') }}
            </th>
            <td>
                @if ($expense->financial)
                : {{ $expense->financial->name ?? '' }}
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
                {{ trans('cruds.expense.fields.accountant') }}
            </th>
            <td>
                @if ($expense->accountant)
                : {{ $expense->accountant->name ?? '' }}
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