<?php

namespace App\Http\Livewire\Bank;

use App\Models\Bank;
use App\Models\Dolar;
use App\Models\DonorAmount;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Admin extends ModalComponent
{
    use LivewireAlert;

    public $amount;
    public Dolar $dolar;
    public array $listsForFields = [];

    public function mount(DonorAmount $amount , Dolar $dolar)
    {
        $this->amount = $amount;
        $this->dolar = $dolar;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.bank.admin');
    }

    public function submit()
    {
        $this->validate();
        $this->dolar->user_id = auth()->id();
        $this->dolar->donor_amount_id = $this->amount->id;
        $b = Bank::find($this->amount->bank_id);
        $bn = Bank::find($this->dolar->bank_id);
        // dd($this->dolar, $b, $bn);
        if($this->dolar->save()){
            $b->dolar -=  $this->dolar->amount;
            $this->amount->teg_amount  +=  $this->dolar->amount;
            $bn->amount += $this->dolar->amount * $this->dolar->unit_amount; 
            $b->save();
            $this->amount->save();
            $bn->save();
        }

        $this->closeModal();
        $this->alert('success',trans('global.create_success'));
        // $this->emitTo('donor.index', '$refresh');
        
    }
    
    protected function rules(): array
    {
        return [
            'dolar.amount' => [
                'numeric',
                'required',
            ],
            'dolar.unit_amount' => [
                'numeric',
                'required',
            ],
            'dolar.details' => [
                'string',
                'required',
            ],
            'dolar.bank_id' => [
                'integer',
                'required',
            ],
      
        ];
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bank']             = Bank::pluck('name', 'id')->toArray();
        // $this->listsForFields['project']          = Project::pluck('name', 'id')->toArray();
    }
}
