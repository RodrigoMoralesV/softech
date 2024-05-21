<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Resolucion extends Model
{
    use HasFactory;

    protected $table = "resolucion";

    // En la db aparece el campo consecutivo_venta, mas no esta marcado como llave primaria ni foranea, tengo que hablarlo con Joan
    protected $primaryKey = "numero_resolucion";

    public function documento(){
        return $this->hasMany(Documento::class, 'numero_resolucion', 'numero_resolucion');
    }
}
