<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProcess extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'quality_id', 'status_id', 'process_id','format_id','quantity'
    ];
}
