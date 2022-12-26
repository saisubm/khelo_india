<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KiaaDetails extends Model
{
    use HasFactory;
    protected $table = 'kiaa_details';
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
