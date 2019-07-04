<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
	protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'weight', 'measure',
    ];

    
}
//nombre - medidas - peso - marca - origen