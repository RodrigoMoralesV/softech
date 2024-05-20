<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Unidad_medida;
use App\Models\Embalaje;
use App\Models\Marca;
use App\Models\Detalle_producto;

class Producto extends Model
{
    use HasFactory;

    protected $table = "producto";

    protected $primaryKey = "id_producto";

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categoria');
    }

    public function unidad_medida(){
        return $this->belongsTo(Unidad_medida::class, 'unidad_medida_id', 'id_unidad_medida');
    }

    public function embalaje(){
        return $this->belongsTo(Embalaje::class, 'embalaje_id', 'id_embalaje');
    }

    public function marca(){
        return $this->belongsTo(Marca::class, 'marca_id', 'id_marca');
    }

    public function detalle_producto(){
        return $this->hasMany(Detalle_producto::class, 'producto_id', 'id_producto');
    }
}
