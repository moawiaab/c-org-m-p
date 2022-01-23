<?php

namespace App\Http\Livewire\Donor;

use App\Models\Dolar;
use App\Models\DonorAmount;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public $amount;


    public function mount(DonorAmount $amount)
    {
        $this->amount = $amount;
    }

    public function render()
    {
        $dolar = Dolar::where('donor_amount_id', $this->amount->id)->get();
        return view('livewire.donor.show-amount', compact('dolar'));
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
