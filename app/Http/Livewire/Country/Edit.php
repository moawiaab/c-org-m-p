<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;

class Edit extends Component
{
    public Country $country;

    public function mount(Country $country)
    {
        $this->country = $country;
    }

    public function render()
    {
        return view('livewire.country.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->country->save();

        return redirect()->route('admin.countries.index');
    }

    protected function rules(): array
    {
        return [
            'country.name' => [
                'string',
                'required',
                'unique:countries,name,' . $this->country->id,
            ],
            'country.code' => [
                'string',
                'required',
            ],
        ];
    }
}
