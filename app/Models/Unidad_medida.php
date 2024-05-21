<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Unidad_medida extends Model
{
    use HasFactory;

    protected $table = "unidad_medida";

    protected $primaryKey = "id_unidad_medida";

    public function producto(){
        return $this->hasMany(Producto::class, 'unidad_medida_id', 'id_unidad_medida');
    }
}
