<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KicDetailsMap extends Model
{
    use HasFactory;
    protected $table = 'kic_details_map';
    public function state(){
        return $this->hasOne(State::class,'id','state_code');
    }
}
