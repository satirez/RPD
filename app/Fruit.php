<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'specie','variety'
    ];
     public function receptions(){
        return $this->hasMany(Reception::class);
    }
}
