<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'donors';

    public $orderable = [
        'id',
        'name',
        'details',
        'phone',
        'email',
        'address',
        'amount',
        'br.name',
        'user.name',
    ];

    public $filterable = [
        'id',
        'name',
        'details',
        'phone',
        'email',
        'address',
        'amount',
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
        'phone',
        'email',
        'address',
        'amount',
        'br_id',
        'user_id',
    ];

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
