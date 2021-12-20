<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAmount extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '0' => 'New',
        '1' => 'Complete',
    ];

    public $table = 'bank_amounts';

    public $orderable = [
        'id',
        'bank_from.name',
        'bank_to.name',
        'amount_in',
        'amount_out',
        'amount',
        'details',
        'user.name',
        'status',
    ];

    public $filterable = [
        'id',
        'bank_from.name',
        'bank_to.name',
        'amount_in',
        'amount_out',
        'amount',
        'details',
        'user.name',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bank_from_id',
        'bank_to_id',
        'amount',
        'details',
    ];

    public function bankFrom()
    {
        return $this->belongsTo(Bank::class);
    }

    public function bankTo()
    {
        return $this->belongsTo(Bank::class);
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
