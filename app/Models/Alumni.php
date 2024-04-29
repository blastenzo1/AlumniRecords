<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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

    public function address()
    {
        return $this->hasOne(Address::class, 'info_id');
    }

    public function educationAttainment()
    {
        return $this->hasOne(EducationAttainment::class, 'info_id');
    }

}
