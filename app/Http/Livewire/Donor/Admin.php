<?php

namespace App\Http\Livewire\Donor;

use App\Models\Bank;
use App\Models\Donor;
use App\Models\DonorAmount;
use App\Models\Project;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Admin extends ModalComponent
{
    use LivewireAlert;

    public DonorAmount $donorAmount;
    public $donor;
    public array $listsForFields = [];
    public array $project = [];

    public function mount(Donor $donor, DonorAmount $donorAmount)
    {
        $this->donor = $donor;
        $this->donorAmount = $donorAmount;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.donor.admin');
    }

    public function submit()
    {
        $this->validate();
        $this->donorAmount->user_id = auth()->id();
        $this->donorAmount->donor_id = $this->donor->id;
        // dd($this->donorAmount);
        $b = Bank::find($this->donorAmount->bank_id);
        if($this->donorAmount->save()){
            $this->donor->amount -= $this->donorAmount->amount;
            $this->donor->save();
            $b->dolar += $this->donorAmount->amount;
            $b->save();
        }
        $this->closeModal();
        $this->alert('success',trans('global.create_success'));
        $this->emitTo('donor.index', '$refresh');
        
    }
    
    protected function rules(): array
    {
        return [
            'donorAmount.amount' => [
                'numeric',
                'required',
            ],
            'donorAmount.details' => [
                'string',
                'required',
            ],
            'donorAmount.bank_id' => [
                'integer',
                'required',
            ],
      
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bank']             = Bank::pluck('name', 'id')->toArray();
        $this->listsForFields['project']          = Project::pluck('name', 'id')->toArray();
    }
}
