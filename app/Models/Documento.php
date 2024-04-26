<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Detalle_pago;
use App\Models\Resolucion;
use App\Models\Estado;
use App\Models\Detalle_producto;
 
class Documento extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class);
    }

    public function detalle_producto(){
        return $this->hasMany(Detalle_producto::class);
    }

    public function resolucion(){
        return $this->belongsTo(Resolucion::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
