<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Detalle_pago;
 
class Estado extends Model
{
    use HasFactory;

    protected $table = "estado";

    protected $primaryKey = "id_estado";

    public function documento(){
        return $this->hasMany(Documento::class, 'estado_id', 'id_estado');
    }

    // Tengo que hablarlo con Joan
    // public function detalle_pago(){
    //     return $this->hasMany(Detalle_pago::class);
    // }
}
