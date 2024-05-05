<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $fillable = ['name', 'college_id'];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
    public function educationAttainments()
    {
        return $this->hasMany(EducationAttainment::class, 'course', 'name');
    }
}
