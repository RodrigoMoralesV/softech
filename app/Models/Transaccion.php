<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Detalle_pago;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = "transaccion";

    protected $primaryKey = "codigo_transaccion";

    public function documento(){
        return $this->hasMany(Documento::class, 'codigo_transaccion', 'codigo_transaccion');
    }

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, 'codigo_transaccion', 'codigo_transaccion');
    }
}
