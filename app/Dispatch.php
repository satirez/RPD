<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'exporter_id', 'patentNo'   
    ];

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }

}

