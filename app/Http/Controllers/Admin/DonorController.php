<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Donor;
use App\Models\DonorAmount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donor.index');
    }

    public function create()
    {
        abort_if(Gate::denies('donor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donor.create');
    }

    public function edit(Donor $donor)
    {
        abort_if(Gate::denies('donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (auth()->user()->br_id !== 1 && $donor->br_id != auth()->user()->br_id) {
            abort_if(true, Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        return view('admin.donor.edit', compact('donor'));
    }

    public function show(Donor $donor)
    {
        // dd(auth()->user()->br_id == 1 || $donor->br_id == auth()->user()->br_id);
        abort_if(Gate::denies('donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $amount = DonorAmount::where('donor_id', $donor->id)->get();
        if (auth()->user()->br_id == 1 || $donor->br_id == auth()->user()->br_id) {
            $donor->load('br', 'user', 'dolar');
            // dd($donor->dolar);
            return view('admin.donor.show', compact('donor'));
        } else {
           return abort_if(true, Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

    }
}
