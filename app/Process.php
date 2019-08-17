<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'tarja_proceso', 'rejected_id',
    ];

    public function receptions()
    {
        return $this->belongsToMany('\App\Reception', 'process__receptions')
            ->withPivot('process_id');
    }

    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }

    public function rejected()
    {
        return $this->belongsTo(Rejected::class);
    }

    public function subprocess()
    {
        return $this->hasMany(SubProcess::class);
    }
}
