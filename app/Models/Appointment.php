<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function labTests()
    {
        return $this->belongsToMany(LabTest::class, 'appointments_lab_test', 'appointments_id', 'lab_tests_id');
    }

    public function labReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LabReports::class, 'appointments_id');
    }
}
