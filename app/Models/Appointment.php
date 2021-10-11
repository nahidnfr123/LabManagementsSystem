<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($appointment) {
            $app = Appointment::orderBy('appointment_no', 'DESC')->first();
            $appointment->appointment_no = empty($app->appointment_no) ? '0001' : $app->appointment_no + 1;
            $appointment->save();
        });
    }
}
