<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'biography',
        'subDomainPrefix',
        'phoneNumber',
        'achievement',
        'bmDcNumber',
        'department',
        'specialityDescription',
        'facebookLink',
        'LinkedInLink',
        'youtubeLink',
    ];

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function visitingSchedules()
    {
        return $this->hasMany(VisitingSchedule::class);
    }
}
