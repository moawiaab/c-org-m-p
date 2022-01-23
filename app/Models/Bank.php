<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '1' => 'Open',
        '0' => 'Close',
    ];

    public $table = 'banks';

    public $orderable = [
        'id',
        'name',
        'details',
        'number',
        'amount',
        'amount_in',
        'amount_out',
        'status',
        'br.name',
        'user.name',
    ];

    public $filterable = [
        'id',
        'name',
        'details',
        'number',
        'amount',
        'amount_in',
        'amount_out',
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
        'number',
        'amount',
        'amount_in',
        'amount_out',
        'status',
    ];

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function dolars(){
        return $this->hasMany(DonorAmount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
