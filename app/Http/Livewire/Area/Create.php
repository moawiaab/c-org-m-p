<?php

namespace App\Http\Livewire\Area;

use App\Models\Area;
use App\Models\Country;
use App\Models\Ctiy;
use Livewire\Component;

class Create extends Component
{
    public Area $area;

    public array $listsForFields = [];

    public function mount(Area $area)
    {
        $this->area = $area;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.area.create');
    }

    public function submit()
    {
        $this->validate();

        $this->area->save();

        return redirect()->route('admin.areas.index');
    }

    protected function rules(): array
    {
        return [
            'area.name' => [
                'string',
                'required',
            ],
            'area.city_id' => [
                'integer',
                'exists:ctiys,id',
                'nullable',
            ],
            'area.country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['city']    = Ctiy::pluck('name', 'id')->toArray();
        $this->listsForFields['country'] = Country::pluck('name', 'id')->toArray();
    }
}
