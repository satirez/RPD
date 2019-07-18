<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayIn_TrayOut extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'trayin_id', 'trayout_id', 'stock',
    ];
}
