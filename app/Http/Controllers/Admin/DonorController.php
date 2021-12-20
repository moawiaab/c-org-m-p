<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
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

        return view('admin.donor.edit', compact('donor'));
    }

    public function show(Donor $donor)
    {
        abort_if(Gate::denies('donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donor->load('br', 'user');

        return view('admin.donor.show', compact('donor'));
    }
}
