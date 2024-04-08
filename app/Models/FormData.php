<?php

namespace App\Models;

use App\EducationAttainment;
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
        'education',
        'awards'
        // Add other fields as needed
    ];
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function currentAddress()
    {
        return $this->hasOne(Address::class)->where('type', 'current');
    }

    public function homeAddress()
    {
        return $this->hasOne(Address::class)->where('type', 'home');
    }
    public function educationAttainments()
    {
        return $this->hasMany(EducationAttainment::class);
    }
}
