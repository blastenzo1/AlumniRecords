<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'status',
        'nationality',
        'occupation',
        'email',
        'living_status',
        'birthdate',
        'education',
        'awards',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];
}
