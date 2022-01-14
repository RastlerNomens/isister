<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'owner','name','gender','birthday','race','code','created_at'
    ];
}
