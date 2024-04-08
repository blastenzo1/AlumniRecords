<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
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
}
