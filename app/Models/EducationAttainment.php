<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationAttainment extends Model
{
    protected $fillable = [
        'course',
        'year_attended',
        'info_id',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'info_id', 'id');
    }
}
