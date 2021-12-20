<?php

namespace App\Http\Livewire\StageDetail;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\StageDetail;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public StageDetail $stageDetail;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(StageDetail $stageDetail)
    {
        $this->stageDetail = $stageDetail;
        $this->initListsForFields();
        $this->mediaCollections = [
            'stage_detail_images' => $stageDetail->images,
        ];
    }

    public function render()
    {
        return view('livewire.stage-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->stageDetail->save();
        $this->syncMedia();

        return redirect()->route('admin.stage-details.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->stageDetail->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'stageDetail.stage_id' => [
                'integer',
                'exists:project_stages,id',
                'nullable',
            ],
            'stageDetail.details' => [
                'string',
                'nullable',
            ],
            'stageDetail.feedback' => [
                'string',
                'nullable',
            ],
            'mediaCollections.stage_detail_images' => [
                'array',
                'nullable',
            ],
            'mediaCollections.stage_detail_images.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'stageDetail.project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['stage']   = ProjectStage::pluck('name', 'id')->toArray();
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
    }
}
