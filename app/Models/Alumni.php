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

    public static function search($query)
{
    return empty($query) ? static::query()
        : static::where('first_name', 'like', '%'.$query.'%')
            ->orWhere('last_name', 'like', '%'.$query.'%')
            ->orWhere('email', 'like', '%'.$query.'%')
            ->orWhere('number', 'like', '%'.$query.'%')
            ->orWhere('sex', 'like', '%'.$query.'%')
            ->orWhere('nationality', 'like', '%'.$query.'%')
            ->orWhere('birthdate', 'like', '%'.$query.'%')
            ->orWhere('status', 'like', '%'.$query.'%')
            ->orWhere('spouse', 'like', '%'.$query.'%');
}

    public function address()
    {
        return $this->hasOne(Address::class, 'info_id');
    }

    public function educationAttainment()
    {
        return $this->hasOne(EducationAttainment::class, 'info_id');
    }
}
