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

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function unidad_medida(){
        return $this->belongsTo(Unidad_medida::class);
    }

    public function embalaje(){
        return $this->belongsTo(Embalaje::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function detalle_producto(){
        return $this->hasMany(Detalle_producto::class);
    }
}
