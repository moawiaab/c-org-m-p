<?php

namespace App\Http\Controllers\Admin;

use App\Models\Budget;
use App\Models\Donor;
use App\Models\Expense;
use App\Models\Project;

class HomeController
{
    public function index()
    {
        $budget = Budget::where('br_id', auth()->user()->br_id)->count();
        $expense = Expense::where('br_id', auth()->user()->br_id)->count();
        $donor = Donor::where('br_id', auth()->user()->br_id)->count();
        $project = Project::join('branch_project', 'projects.id', 'branch_project.project_id')->whereIn('branch_project.branch_id', [auth()->user()->br_id])->count();
        $data = [
            'budget'             => $budget,
            'donor'              => $donor,
            'project'            => $project,
            'expense'            => $expense,
        ];
        return view('admin.home', compact('data'));
    }
}
