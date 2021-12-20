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

class Expense extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'expenses';

    public $orderable = [
        'id',
        'bud_name.name',
        'budget.amount',
        'br.name',
        'user.name',
        'amount',
        'text_amount',
        'beneficiary',
        'details',
        'feeding',
        'stage',
    ];

    public $filterable = [
        'id',
        'bud_name.name',
        'budget.amount',
        'br.name',
        'user.name',
        'amount',
        'text_amount',
        'beneficiary',
        'details',
        'feeding',
        'stage',
    ];

    protected $appends = [
        'invoice',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bud_name_id',
        'budget_id',
        'amount',
        'text_amount',
        'beneficiary',
        'details',
        'feeding',
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

    public function budName()
    {
        return $this->belongsTo(BudgetName::class);
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function administrative()
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

    public function getInvoiceAttribute()
    {
        return $this->getMedia('expense_invoice')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
