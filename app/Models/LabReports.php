<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReports extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function labTest()
    {
        return $this->belongsTo(LabTest::class);
    }
}
