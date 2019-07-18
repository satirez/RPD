<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayOut extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'traysout', 'provider_id',
    ];

    public function TrayIn(){
        return $this->belongsToMany('\App\TrayIn','TrayIn_TrayOut')
        ->withPivot('trayin_id');
    }
}
