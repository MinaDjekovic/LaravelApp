<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'index', 'faculty_id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
