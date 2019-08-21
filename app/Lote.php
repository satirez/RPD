<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $fillable = [
        'numero_lote','subprocess_id'
    ];


     public function dispatches()
    {
        return $this->belongsTo(Dispatch::class);
    }
}
