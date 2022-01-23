<?php

namespace App\Http\Livewire\Ratification;

use App\Models\Branch;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\Ratification;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    use LivewireAlert;
    public array $mediaToRemove = [];

    public $project;
    public $stage;
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

    public function mount(Ratification $ratification, Project $project, ProjectStage $stage)
    {
        $this->ratification = $ratification;
        $this->initListsForFields();
    }

    public function render()
    {
        // dd($this->project, $this->stage);
        return view('livewire.ratification.create');
    }

    public function submit()
    {
        $this->validate();

        $this->ratification->user_id = auth()->id();
        $this->ratification->br_id = auth()->user()->br_id;
        $this->ratification->project_id = $this->project->id;
        $this->ratification->project_stage_id = $this->stage->id;
        $this->ratification->stage = 1;
        $this->ratification->save();
        $this->syncMedia();
        $this->flash('success', trans('global.create_success'));
        return redirect()->route('admin.ratification.index');
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
