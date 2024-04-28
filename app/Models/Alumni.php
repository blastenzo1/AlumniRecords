<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Alumni extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['first_name', 'last_name', 'last_name', 'email', 'number']);
    }
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'birthdate',
        'sex',
        'nationality',
        'status',
        'spouse',
        'number',
        'email'
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'info_id');
    }

    public function educationAttainment()
    {
        return $this->hasOne(EducationAttainment::class, 'info_id');
    }
}
