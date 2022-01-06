<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_RADIO = [
        '2' => 'New',
        '1' => 'Open',
        '0' => 'Close',
    ];

    public $table = 'projects';

    public $orderable = [
        'id',
        'name',
        'all_amount',
        'expense_amount',
        'reserved_amount',
        'country.name',
        'status',
    ];

    public $filterable = [
        'id',
        'name',
        'all_amount',
        'expense_amount',
        'reserved_amount',
        'user.name',
        'country.name',
        'status',
        'phases.name',
        'partners.name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'details',
        'all_amount',
        'administrative_ratio',
        'ratio',
        'beneficiaries_number',
        'project_department_id',
        'project_branch_id',
        'donor_id',
        'country_id',
        'city_id',
        'area_id',
        'status',
    ];

    public function projectDepartment()
    {
        return $this->belongsTo(ProjectDepartment::class);
    }

    public function projectBranch()
    {
        return $this->belongsTo(ProjectBranch::class, 'project_branch_id');
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(Ctiy::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_RADIO[$this->status] ?? null;
    }

    public function phases()
    {
        return $this->belongsToMany(ProjectStage::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Branch::class, );
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}