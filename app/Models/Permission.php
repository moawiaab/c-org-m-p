<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '0' => 'all',
        '1' => 'local',
    ];

    public $table = 'permissions';

    public $orderable = [
        'id',
        'title',
        'status',
        'br.name',
    ];

    public $filterable = [
        'id',
        'title',
        'status',
        'br.name',
    ];

    protected $fillable = [
        'title',
        'status',
        'br_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
