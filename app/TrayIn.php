<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayIn extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'traysin', 'provider_id',
    ];

    public function TrayOut(){
        return $this->belongsToMany('\App\TrayOut','TrayIn_TrayOut')
        ->withPivot('trayout_id');
    }
}
