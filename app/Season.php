<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','start_date','end_date'
    ];

      public function receptions(){
        return $this->hasMany(Reception::class);
    }
}
