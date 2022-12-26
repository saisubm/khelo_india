<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfscg extends Model
{
    use HasFactory;
    protected $table = 'pf_sdc';
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
