<?php

namespace App\Http\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Branch $branch;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Branch $branch)
    {
        $this->branch         = $branch;
        $this->branch->status = '1';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.branch.create');
    }

    public function submit()
    {
        $this->validate();

        $this->branch->save();
        $this->syncMedia();

        return redirect()->route('admin.branches.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->branch->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'branch.name' => [
                'string',
                'required',
            ],
            'branch.address' => [
                'string',
                'nullable',
            ],
            'branch.email' => [
                'email:rfc',
                'required',
                'unique:branches,email',
            ],
            'branch.phone' => [
                'string',
                'nullable',
            ],
            'branch.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'mediaCollections.branch_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.branch_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->branch::STATUS_RADIO;
    }
}
