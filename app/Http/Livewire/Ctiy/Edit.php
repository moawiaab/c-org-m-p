<?php

namespace App\Http\Livewire\Ctiy;

use App\Models\Country;
use App\Models\Ctiy;
use Livewire\Component;

class Edit extends Component
{
    public Ctiy $ctiy;

    public array $listsForFields = [];

    public function mount(Ctiy $ctiy)
    {
        $this->ctiy = $ctiy;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ctiy.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->ctiy->save();

        return redirect()->route('admin.ctiys.index');
    }

    protected function rules(): array
    {
        return [
            'ctiy.name' => [
                'string',
                'required',
            ],
            'ctiy.country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['country'] = Country::pluck('name', 'id')->toArray();
    }
}
