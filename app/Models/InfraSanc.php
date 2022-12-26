<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
class InfraSanc extends Model
{
    use HasFactory;
    protected $table = 'infrastrcture_san_amt';
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
