<?php

namespace App\Http\Livewire\Ratification;

use App\Models\Bank;
use App\Models\Ratification;
use App\Models\Shek;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Admin extends ModalComponent
{
    use LivewireAlert;
    public Shek $shek;
    public $ratification;
    public array $listsForFields = [];
    public $bank_id;
    public $entry_date;
    public $shek_number;

    public function mount(Ratification $ratification)
    {
        $this->ratification = $ratification;
        if ($ratification->stage ===  3) {
            $this->shek = new Shek();
        }
        $this->initListsForFields();
    }
    public function render()
    {
        // dd($this->ratification);   
        return view('livewire.ratification.admin');
    }

    public function submit()
    {
        $this->validate();

        // dd($this->shek);
        if ($this->ratification->stage === 1) {
            $this->ratification->stage = 2;
            $this->ratification->executive_id = auth()->id();
        } elseif ($this->ratification->stage === 2) {
            $this->ratification->stage = 3;
            $this->ratification->financial_id = auth()->id();
        } elseif ($this->ratification->stage === 3 && $this->shek) {
            $this->ratification->stage          = 4;
            $this->ratification->accountant_id      = auth()->id();
            if ($this->ratification->save()) {
                $this->shek->project_id   = $this->ratification->id;
                $this->shek->type         = 0;
                $this->shek->amount       = $this->ratification->amount;
                $this->shek->bank_id      = $this->bank_id;
                $this->shek->user_id      = auth()->id();
                $this->shek->br_id        = auth()->user()->br_id;
                $this->shek->shek_number  = $this->shek_number;
                $this->shek->entry_date   = $this->entry_date;
                $this->shek->amount_text  = $this->ratification->amount_text;
                $this->shek->status       = 1;
                if ($this->shek->save()) {
                    //TODO: check For teg amount now or after shek
                    return redirect()->route('admin.ratifications.print', $this->ratification->id);
                }
            }
        }
        $this->ratification->save();
        $this->closeModal();
        $this->alert('success', trans('global.opening_last'));
        $this->emitTo('ratification.index', '$refresh');
    }

    protected function rules(): array
    {
        return [
            'ratification.amount' => [
                'numeric',
                'required',
            ],
            'ratification.amount_text' => [
                'string',
                'required',
            ],
            'ratification.details' => [
                'string',
                'required',
            ],
            'ratification.feedback' => [
                'string',
                'nullable',
            ],
        ];
    }


    protected function initListsForFields(): void
    {
        $this->listsForFields['bank']    = Bank::pluck('name', 'id')->toArray();
    }
}
