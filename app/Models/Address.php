<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $fillable = [
        'current_street',
        'current_city',
        'current_country',
        'current_zip_code',
        'home_street',
        'home_city',
        'home_country',
        'home_zip_code',
        'info_id',
    ];

    public function person()
    {
        return $this->belongsTo(Alumni::class, 'info_id', 'id');
    }
}
