<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'variety', 'fruit_id'
    ];

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }
}
