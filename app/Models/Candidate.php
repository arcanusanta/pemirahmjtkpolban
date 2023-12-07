<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Candidate extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'sequence_number', 'fullname', 'photo', 'vision_and_mission', 'curriculum_vitae'
    ];

    protected $guarded = [];

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
}
