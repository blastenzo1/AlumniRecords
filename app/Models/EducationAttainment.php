<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EducationAttainment extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['course', 'year_attended']);
    }
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
