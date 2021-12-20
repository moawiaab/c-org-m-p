<?php

namespace App\Http\Livewire\Ratification;

use App\Models\Branch;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\Ratification;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public Ratification $ratification;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Ratification $ratification)
    {
        $this->ratification = $ratification;
        $this->initListsForFields();
        $this->mediaCollections = [
            'ratification_invoices' => $ratification->invoices,
        ];
    }

    public function render()
    {
        return view('livewire.ratification.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->ratification->save();
        $this->syncMedia();

        return redirect()->route('admin.ratifications.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->ratification->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'ratification.project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'ratification.project_stage_id' => [
                'integer',
                'exists:project_stages,id',
                'nullable',
            ],
            'ratification.amount' => [
                'numeric',
                'required',
            ],
            'ratification.amount_text' => [
                'string',
                'required',
            ],
            'ratification.beneficiary' => [
                'string',
                'required',
            ],
            'ratification.details' => [
                'string',
                'required',
            ],
            'mediaCollections.ratification_invoices' => [
                'array',
                'required',
            ],
            'mediaCollections.ratification_invoices.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'ratification.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'ratification.br_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'ratification.stage' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'ratification.feedback' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project']       = Project::pluck('name', 'id')->toArray();
        $this->listsForFields['project_stage'] = ProjectStage::pluck('name', 'id')->toArray();
        $this->listsForFields['user']          = User::pluck('name', 'id')->toArray();
        $this->listsForFields['br']            = Branch::pluck('name', 'id')->toArray();
    }
}
