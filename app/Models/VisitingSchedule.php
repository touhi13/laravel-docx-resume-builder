<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'organizationName',
        'orgPhone',
        'orgEmail',
        'orgAddress',
        'division',
        'district',
        'area',
        'position',
        'visitingDay',
        'visitingTimeFrom',
        'visitingTimeTo',
        'appointmentPhoneNumber',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
