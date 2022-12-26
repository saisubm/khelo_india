<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KisceDetails extends Model
{
    use HasFactory;
    protected $table = 'kisce_details';
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
