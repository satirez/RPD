<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProcess extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'process_id', 'format_id', 'quality_id', 'quantity','weight',
         'available', 'rejected', 'reason', 'comment'
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
        return $this->quality(Quality::class);
    }
    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class);
    }
}
