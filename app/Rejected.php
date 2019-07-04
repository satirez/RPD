<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejected extends Model
{
	
	protected $primaryKey = 'id';

    protected $fillable = [
        'reason', 'description',
    ];

   public function receptions(){
        return $this->hasMany(Reception::class);
    }
}
