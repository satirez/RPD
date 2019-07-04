<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
        'tarja_proceso','Box_out','rejected_id'
            
    ];
     public function receptions(){
        return $this->belongsToMany('\App\Reception','process_reception')
            ->withPivot('process_id');
    }

    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }

}

