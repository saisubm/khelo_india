<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
class Medal extends Model
{
    use HasFactory;
    //  protected $table = 'kic_details';
    //  protected $guarded  = [];
    protected $table = 'medal_details';
    protected $guarded  = [];

    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
