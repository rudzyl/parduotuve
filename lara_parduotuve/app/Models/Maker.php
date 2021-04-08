<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Maker extends Model
{
    public function makerCars()
   {
       return $this->hasMany('App\Models\Car', 'maker_id', 'id');
   }

   public static function new() {
       return new self;
   }

   public function refreshAndSave(Request $request) {
    $this->name = $request->maker_name;
    $this->save();
    return $this;
   }
    use HasFactory;
}
