<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{   
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'numero_lote', 'fruit_id',
        'quality_id', 'variety_id'
    ];


     public function dispatches()
    {
        return $this->belongsTo(Dispatch::class);
    }
  

     public function subprocesses()
    {
        return $this->belongsToMany('\App\Lote', 'lote_sub_process')
            ->withPivot('sub_process_id');
    }

    public function subprocess()
    {
        return $this->belongsToMany('\App\SubProcess', 'lote_sub_process')
         ->withPivot('lote_id');
    }
    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }
    public function varieties()
    {
        return $this->belongsTo(Variety::class,'variety_id');
    }
}
