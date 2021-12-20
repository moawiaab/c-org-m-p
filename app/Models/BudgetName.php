<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetName extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const TYPE_RADIO = [
        '0' => 'Local',
        '1' => 'Public',
    ];

    public const STATUS_RADIO = [
        '0' => 'Close',
        '1' => 'Open',
    ];

    public $table = 'budget_names';

    public $orderable = [
        'id',
        'name',
        'details',
        'type',
        'status',
        'br.name',
        'user.name',
    ];

    public $filterable = [
        'id',
        'name',
        'details',
        'type',
        'status',
        'br.name',
        'user.name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'details',
        'type',
        'status',
        'br_id',
        'user_id',
    ];

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_RADIO[$this->type] ?? null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
