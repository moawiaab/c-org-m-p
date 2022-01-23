@extends('layouts.admin')
@section('header')
<div class="col-sm-6">
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.banks.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ trans('global.view') }}
            {{ trans('cruds.bank.title_singular') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.banks.index') }}">{{ trans('cruds.bank.title_singular') }}
                {{ trans('global.list') }}</a></li>
        <li class="breadcrumb-item active"><a href="/"> {{ trans('global.dashboard') }}</a></li>
    </ol>
</div>
@endsection
@section('content')
<div class="pt-3">
    <table class="table table-view">
        <tbody class="bg-white">
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.id') }}
                </th>
                <td>
                    {{ $bank->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.name') }}
                </th>
                <td>
                    {{ $bank->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.details') }}
                </th>
                <td>
                    {{ $bank->details }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.number') }}
                </th>
                <td>
                    {{ $bank->number }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.amount') }}
                </th>
                <td>
                    {{ $bank->amount }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.amount_in') }}
                </th>
                <td>
                    {{ $bank->amount_in }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.amount_out') }}
                </th>
                <td>
                    {{ $bank->amount_out }}
                </td>
            </tr>

            <tr>
                <th>
                    {{ trans('cruds.bank.fields.dolar') }}
                </th>
                <td>
                    {{ $bank->dolar }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.status') }}
                </th>
                <td>
                    {{ $bank->status_label }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.br') }}
                </th>
                <td>
                    @if($bank->br)
                    <span class="badge badge-relationship">{{ $bank->br->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.user') }}
                </th>
                <td>
                    @if($bank->user)
                    <span class="badge badge-relationship">{{ $bank->user->name ?? '' }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.created_at') }}
                </th>
                <td>
                    {{ $bank->created_at }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.bank.fields.updated_at') }}
                </th>
                <td>
                    {{ $bank->updated_at }}
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

                    <th class="w-28">
                        {{ trans('cruds.donor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.donor.fields.details') }}
                    </th>
                    <th>
                        {{ trans('cruds.donor.title_singular') }}
                    </th>

                    <th>
                        {{ trans('cruds.donor.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.donor.fields.teg_amount') }}
                    </th>

                    <th>
                        {{ trans('cruds.donor.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.donor.fields.created_at') }}
                    </th>

                    <th>
                        {{ trans('cruds.donor.fields.created_at') }}
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($bank->dolars as $d)
                <tr>
                    <td>
                        {{ $d->id }}
                    </td>
                    <td>
                        {{ $d->details }}
                    </td>
                    <td>
                        {{ $d->donor->name }}
                    </td>
                    <td>
                        {{ $d->amount }}
                    </td>

                    <td>
                        {{ $d->teg_amount }}
                    </td>
                    <td>
                        @if($d->user)
                        <span class="badge badge-relationship">{{ $d->user->name ?? '' }}</span>
                        @endif
                    </td>
                    <td>
                        {{ $d->created_at }}
                    </td>

                    <td>
                        {{ $d->created_at->diffForHumans() }}
                    </td>

                    <td>
                        <div class="flex justify-end">
                            @if (($d->amount - $d->teg_amount) > 0 )
                            <button
                                onclick='Livewire.emit("openModal", "bank.admin", {{json_encode(["amount" => $d])}})'
                                type="button" class="btn btn-sm">
                                <i class="fas fa-hand-holding-usd text-green" title=""></i>
                            </button>
                            @endif
                            <button
                                onclick='Livewire.emit("openModal", "donor.show", {{json_encode(["amount" => $d])}})'
                                type="button" class="btn btn-sm">
                                <i class="far fa-eye text-info" title=""></i>
                            </button>
                        </div>
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
<div class="form-group">
    @can('bank_edit')
    <a href="{{ route('admin.banks.edit', $bank) }}" class="btn btn-sm mr-2">
        <i class="far fa-edit text-success" title="{{ trans('global.edit') }}"></i>
    </a>
    @endcan
    <a class="btn btn-sm bg-gradient-info" href="{{ route('admin.banks.index') }}">
        <i class="fas fa-arrow-left"></i>
        {{ trans('global.back') }}
    </a>
</div>
@endsection