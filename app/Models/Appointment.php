<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{


    protected $fillable = [
        "app",
        "patient_id",
        "app_date",
        "app_time",
        "periode",
        "created_at"

    ];
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }


}