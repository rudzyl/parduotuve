<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    public function makerCars()
   {
       return $this->hasMany('App\Models\Car', 'maker_id', 'id');
   }

    use HasFactory;
}
