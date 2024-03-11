<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        "country_id",
        "state_name",
        "state_status"
  
  
  
          
      ];
      public function cityes(){
        return $this->hasMany(City::class, 'state_id');
       }
       public function country(){
        return $this->belongsTo(Country::class);
       }
  
}
