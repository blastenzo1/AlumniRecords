<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

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
        'address',
        'education',
        'awards'
        // Add other fields as needed
    ];
}
