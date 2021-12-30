<?php

namespace App\Http\Livewire\Treasury;

use App\Models\Treasury;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public Treasury $treasury;

    public function mount(Treasury $treasury)
    {
        $this->treasury = $treasury;
    }

    public function render()
    {
        return view('livewire.treasury.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->treasury->save();
        $this->flash('success', trans('global.update_success'));
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
