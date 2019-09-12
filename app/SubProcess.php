<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProcess extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'process_id', 'format_id', 'quality_id', 'quantity','weight',
        'available', 'rejected', 'reason', 'comment', 'fruit_id',
        'quality_id', 'variety_id'
    ];

    public function process()
    {
        return $this->hasOne(Process::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }
    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }
    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }
     public function lotes()
    {
        return $this->belongsToMany('\App\Lote', 'lote_sub_process')
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
