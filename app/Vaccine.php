<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'pet','type','date','next','weight','batch','veterinary'
    ];
}
