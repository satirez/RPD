<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'exporter_id', 'patentNo','rejected'   
    ];

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
	public function rejected(){
        return $this->belongsTo(Rejected::class);
    }
}

