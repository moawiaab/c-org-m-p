<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shek extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '1' => 'New',
        '0' => 'End',
    ];

    public const TYPE_RADIO = [
        '1' => 'Expense',
        '0' => 'Project',
    ];

    public $table = 'sheks';

    public $orderable = [
        'id',
        'expense.amount',
        'project.name',
        'type',
        'amount',
        'bank.name',
        'user.name',
        'br.name',
        'shek_number',
        'entry_date',
        'amount_text',
        'status',
    ];

    public $filterable = [
        'id',
        'expense.amount',
        'project.name',
        'type',
        'amount',
        'bank.name',
        'user.name',
        'br.name',
        'shek_number',
        'entry_date',
        'amount_text',
        'status',
    ];

    protected $dates = [
        'entry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'expense_id',
        'project_id',
        'amount',
        'bank_id',
        'shek_number',
        'entry_date',
        'amount_text',
    ];

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_RADIO[$this->type] ?? null;
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function br()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
