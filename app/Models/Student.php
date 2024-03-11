<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name",
        "last_name",
        "dob",
        "email_id",
        "mobile",
        "gender",
        "address",
        "city",
        "pin_code",
        "state",
        "country",
        "hobbies",
        "courses"
    ];
    public function stuQualifications (){
        return $this-> hasMany(Student_qualification::class);
    }
}
