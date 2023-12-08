<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey= 'id';
    protected $fillable = ["voter_id, candidate_id"];

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id', 'id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
