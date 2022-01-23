<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'details',
        'donor_amount_id',
        'bank_id',
        'unit_amount',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
