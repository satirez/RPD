<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
	protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'weight', 'measure',
    ];

    public function receptions(){
        return $this->hasMany(Reception::class);
    }
    
}
//nombre - medidas - peso - marca - origen