<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectBranch extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'project_branches';

    public $orderable = [
        'id',
        'name',
        'details',
        'proj.name',
        'user.name',
        'br.name',
    ];

    public $filterable = [
        'id',
        'name',
        'details',
        'proj.name',
        'user.name',
        'br.name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'details',
        'proj_id',
        'user_id',
        'br_id',
    ];

    public function proj()
    {
        return $this->belongsTo(ProjectDepartment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
