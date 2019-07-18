<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{


	protected $primaryKey = 'id';

    protected $fillable = [
        'name','largo','alto','ancho', 'weight'
    ];
  
}
