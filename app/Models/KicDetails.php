<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KicDetails extends Model
{
    use HasFactory;
    protected $table = 'kic_details';
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
