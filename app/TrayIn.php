<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayIn extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'traysin', 'provider_id', 'traysout', 'haber'
    ];

 
    
    public function provider()
    {
        return $this->belongsTo(Providers::class);
    }

}
