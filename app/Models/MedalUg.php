<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedalUg extends Model
{
    use HasFactory;
    protected $table = 'medal_details_ug';
    protected $guarded  = [];
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
