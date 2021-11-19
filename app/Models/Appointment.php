<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function labTests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LabTest::class);
    }
}
