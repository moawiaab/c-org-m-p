<?php

namespace App\Http\Livewire\FiscalYear;

use App\Models\Branch;
use App\Models\FiscalYear;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public FiscalYear $fiscalYear;

    public array $listsForFields = [];

    public function mount(FiscalYear $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.fiscal-year.create');
    }

    public function submit()
    {
        $this->validate();
        $br = Branch::find(auth()->user()->br_id);
        if($br->status == 1){
            $fisc = FiscalYear::whereIn('br_id', Branch::where('status', 1)->pluck('id'))->where('status', 1)->first();
        }else{
            $fisc = FiscalYear::where('br_id', auth()->user()->br_id)->where('status', 1)->first();
        }
        // dd($fisc);
        if ($fisc !== null) {
            $this->flash('error', trans('global.f_open'));
            return redirect()->route('admin.fiscal-years.index');
        } else {
            $this->fiscalYear->user_id = auth()->id();
            $this->fiscalYear->amount  = 0;
            $this->fiscalYear->status  = 1;
            $this->fiscalYear->br_id   = auth()->user()->br_id;
            $this->fiscalYear->save();
            $this->flash('success', trans('global.create_success'));
            return redirect()->route('admin.fiscal-years.index');
        }
    }

    protected function rules(): array
    {
        return [
            
            'fiscalYear.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
      
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->fiscalYear::STATUS_RADIO;
        $this->listsForFields['br']     = Branch::pluck('name', 'id')->toArray();
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
    }
}
