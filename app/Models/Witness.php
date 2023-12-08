<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Spatie\Permission\Traits\HasRoles;

class Witness extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $keyType = 'string';

    protected $fillable = [
        'nim', 'name', 'study_program_id', 'grade_id', 'year', 'email', 'password'
    ];

    protected $guarded = [];
    protected $guard_name = 'web';

    protected $casts = [
        'id' => 'string',
    ];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($obj) {
            $obj->id = RamseyUuid::uuid4()->toString();
        });
    }

    public function study_programs()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
