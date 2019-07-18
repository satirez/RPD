<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'season_id', 'grossweight', 'provider_id', 'fruit_id', 'quality_id', 'netweight', 'status_id', 'rejected',
        'middleweight_supplie', 'tray_in', 'tray_out', 'name_driver', 'number_guide', 'comment', 'temperature', 'tarja', 'middleweight_trays', 'rejected_id', 'quantity', 'palet_weight', 'supplies_id',
    ];

    public function provider()
    {
        return $this->belongsTo(Providers::class);
    }

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

    public function process()
    {
        return $this->belongsToMany('\App\Process', 'process_reception')
         ->withPivot('process_id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function rejected()
    {
        return $this->belongsTo(Rejected::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }

    public function supplies()
    {
        return $this->belongsToMany(Supplies::class);
    }
}
