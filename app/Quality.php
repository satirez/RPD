<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'description',
    ];
    
     public function receptions(){
        return $this->hasMany(Reception::class);
    }

    public function subprocess()
    {
        return $this->hasMany(SubProcess::class);
    }
}
