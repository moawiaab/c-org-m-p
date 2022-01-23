<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorAmount extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'donor_amount';


    protected $fillable = [
        'amount',
        'details',
        'donor_id',
        'bank_id',
        'user_id',
        'teg_amount'
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

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
