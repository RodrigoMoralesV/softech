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

    protected $table = "detalle_pago";

    public function banco(){
        return $this->belongsTo(Banco::class, 'banco_id', 'id_banco');
    }

    public function tipo_tarjeta(){
        return $this->belonsTo(Tipo_tarjeta::class, 'tipo_tarjeta_id', 'id_tipo_tarjeta');
    }

    public function tipo_cuenta(){
        return $this->belongsTo(Tipo_cuenta::class, 'tipo_cuenta_id', 'id_tipo_cuenta');
    }

    public function metodo_pago(){
        return $this->belongsTo(Metodo_pago::class, 'metodo_pago_id', 'id_metodo_pago');
    }

    public function documento(){
        return $this->belongsTo(Documento::class);
    }
}
