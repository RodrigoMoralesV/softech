<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Documento;

class Detalle_producto extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'codigo_transaccion', 
        'numero_documento', 
        'producto_id'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }

    public function documento(){
        return $this->belongsTo(Documento::class, [
            'codigo_transaccion',
            'numero_documento'
        ], [
            'codigo_transaccion',
            'numero_documento'
        ]);
    }
}
