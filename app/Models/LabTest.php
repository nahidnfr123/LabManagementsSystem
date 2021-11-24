<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointments_lab_test', 'lab_tests_id', 'appointments_id');
    }
}
