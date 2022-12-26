<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expenditure;
class Vertical extends Model
{
    use HasFactory;
    protected $table="vertical_master";

    public function expenditures(){
        return $this->hasMany(Expenditure::class,'vertical_id','id');
    }
}
