<?php

namespace App\Http\Livewire\Treasury;

use App\Models\Treasury;
use Livewire\Component;

class Create extends Component
{
    public Treasury $treasury;

    public function mount(Treasury $treasury)
    {
        $this->treasury = $treasury;
    }

    public function render()
    {
        return view('livewire.treasury.create');
    }

    public function submit()
    {
        $this->validate();

        $this->treasury->save();

        return redirect()->route('admin.treasuries.index');
    }

    protected function rules(): array
    {
        return [
            'treasury.name' => [
                'string',
                'required',
            ],
        ];
    }
}
