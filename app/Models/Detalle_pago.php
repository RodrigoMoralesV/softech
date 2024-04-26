<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banco;
use App\Models\Tipo_tarjeta;
use App\Models\Tipo_cuenta;
use App\Models\Metodo_pago;
use App\Models\Documento;
 
class Detalle_pago extends Model
{
    use HasFactory;

    public function banco(){
        return $this->belongsTo(Banco::class);
    }

    public function tipo_tarjeta(){
        return $this->belonsTo(Tipo_tarjeta::class);
    }

    public function tipo_cuenta(){
        return $this->belongsTo(Tipo_cuenta::class);
    }

    public function metodo_pago(){
        return $this->belongsTo(Metodo_pago::class);
    }

    public function documento(){
        return $this->belongsTo(Documento::class);
    }
}
