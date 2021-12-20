<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ratification extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'ratifications';

    public $orderable = [
        'id',
        'project.name',
        'project_stage.name',
        'amount',
        'amount_text',
        'beneficiary',
        'details',
        'user.name',
        'br.name',
        'stage',
        'feedback',
    ];

    public $filterable = [
        'id',
        'project.name',
        'project_stage.name',
        'amount',
        'amount_text',
        'beneficiary',
        'details',
        'user.name',
        'br.name',
        'stage',
        'feedback',
    ];

    protected $appends = [
        'invoices',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_id',
        'project_stage_id',
        'amount',
        'amount_text',
        'beneficiary',
        'details',
        'user_id',
        'br_id',
        'stage',
        'feedback',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectStage()
    {
        return $this->belongsTo(ProjectStage::class);
    }

    public function getInvoicesAttribute()
    {
        return $this->getMedia('ratification_invoices')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function projectManager()
    {
        return $this->belongsTo(User::class);
    }

    public function executive()
    {
        return $this->belongsTo(User::class);
    }

    public function financial()
    {
        return $this->belongsTo(User::class);
    }

    public function accountant()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
