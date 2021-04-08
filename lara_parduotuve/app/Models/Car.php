<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    use HasFactory;

    public function carMaker()
    {
        return $this->belongsTo('App\Models\Maker', 'maker_id', 'id');
    }
    public static function new() {
        return new self;
    }

    public function refreshAndSave(Request $request) {
        $this->name = $request->car_name;
        $this->plate = $request->car_plate;
        $this->about = $request->car_about;
        $this->maker_id = $request->maker_id;
        $this->save();
        return $this;
       }

        
 
}
