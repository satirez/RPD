<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tray extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'provider_id', 'providerTrays', 'freeztrays',
    ];

    public function providers(){
        return $this->belongTo(Provider::class);
    }
}
