<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
class AthleteRecord extends Model
{
    use HasFactory;
    protected $table = 'athletes_record_details';
    protected $guarded  = [];
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
