<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_pago;

class Tipo_tarjeta extends Model
{
    use HasFactory;

    protected $table = "tipo_tarjeta";

    protected $primaryKey = "id_tipo_tarjeta";

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, 'tipo_tarjeta_id', 'id_tipo_tarjeta');
    }
}
