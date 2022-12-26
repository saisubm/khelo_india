<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AscPart extends Model
{
    use HasFactory;
    protected $table = 'medal_details';
    protected $guarded  = [];
}
