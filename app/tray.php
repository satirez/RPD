<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tray extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'provider_id', 'providerTrays', 'freezTrays',
    ];

    public function providers(){
        return $this->belongTo(Providers::class);
    }
}
