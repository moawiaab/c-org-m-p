<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStage extends Model
{
        use HasFactory;
        use HasAdvancedFilter;
        use SoftDeletes;
    
        public const STATUS_RADIO = [
            '1' => 'open',
            '0' => 'close',
        ];
    
        public $table = 'project_stages';
    
        public $orderable = [
            'id',
            'name',
            'details',
            'status',
            'br.name',
        ];
    
        public $filterable = [
            'id',
            'name',
            'details',
            'status',
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
            'status',
            'br_id',
        ];
    
        public function getStatusLabelAttribute($value)
        {
            return static::STATUS_RADIO[$this->status] ?? null;
        }
    
        public function user()
        {
            return $this->belongsToMany(User::class);
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