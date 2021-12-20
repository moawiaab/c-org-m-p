<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '0' => 'Close',
        '1' => 'Open',
    ];

    public $table = 'budgets';

    public $orderable = [
        'id',
        'budget.name',
        'br.name',
        'user.name',
        'fiscal_year.date',
        'amount',
        'expense_amount',
        'status',
    ];

    public $filterable = [
        'id',
        'budget.name',
        'br.name',
        'user.name',
        'fiscal_year.date',
        'amount',
        'expense_amount',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'budget_id',
        'br_id',
        'user_id',
        'fiscal_year_id',
        'amount',
        'expense_amount',
        'status',
    ];

    public function budget()
    {
        return $this->belongsTo(BudgetName::class);
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
