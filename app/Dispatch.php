<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $primaryKey = 'id';
	
    protected $fillable = [
        
            'exporter_id', 'planilla_dispatch','numero_guia','numero_despacho','season_id','tipodispatch_id','puerto_salida','puerto_destino','consignatario','numero_contenedor','nombre_chofer','patente_vehiculo','patente_rampla','rejected','comment','tipoproductodispatch_id','tipotransporte_id','fruit_id',
            'quality_id', 'variety_id'
    ];

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }

    public function subprocesses()
    {
        return $this->belongsToMany(SubProcess::class);
    }

	public function rejected(){
        return $this->belongsTo(Rejected::class);
    }

     public function season()
    {
        return $this->belongsTo(Season::class);
    }


     public function tipodispatch()
    {
        return $this->belongsTo(TipoDispatch::class);
    }

    public function tipotransporte()
    {
        return $this->belongsTo(TipoTransporte::class);
    }
        public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}

