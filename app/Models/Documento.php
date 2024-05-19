<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Detalle_pago;
use App\Models\Detalle_producto;
use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Resolucion;
use App\Models\Transaccion;
 
class Documento extends Model
{
    use HasFactory;

    protected $table = "documento";

    protected $primaryKey = [
        "codigo_transaccion",
        "numero_documento"
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, [
            'codigo_transaccion',
            'numero_documento'
        ], [
            'codigo_transaccion',
            'numero_documento'
        ]);
    }

    public function detalle_producto(){
        return $this->hasMany(Detalle_producto::class, [
            'codigo_transaccion',
            'numero_documento'
        ], [
            'codigo_transaccion',
            'numero_documento'
        ]);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'nit_empresa', 'nit_empresa');
    }

    public function estado(){
        return $this->belongsTo(Estado::class, 'estado_id', 'id_estado');
    }

    public function resolucion(){
        return $this->belongsTo(Resolucion::class, 'numero_resolucion', 'numero_resolucion');
    }

    public function transaccion(){
        return $this->belongsTo(Transaccion::class, 'codigo_transaccion', 'codigo_transaccion');
    }
}
