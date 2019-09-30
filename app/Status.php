<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function receptions(){
        return $this->hasMany(Reception::class);
    }
}
