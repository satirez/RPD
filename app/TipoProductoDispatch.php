<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProductoDispatch extends Model
{
     protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
}
