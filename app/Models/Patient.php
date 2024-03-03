<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{

    protected $fillable = [
        "name",
        "document_id",
        "phone",
        "notes",
        "created_at",
        "first_visit"

    ];
    use HasFactory;


    public function appointments()
    {
        return $this->hasMany(Appointment::class, "patient_id");
    }

    public function scopeSearch($query)
    {


        if (request("search")) {

            return $query->where("name", "like", "%" . request("search") . "%")->orwhere("document_id", "like", request("search"))->orwhere("phone", "like", request("search"));



        }
    }
}