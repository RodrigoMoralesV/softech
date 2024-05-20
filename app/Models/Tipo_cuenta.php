<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_pago;

class Tipo_cuenta extends Model
{
    use HasFactory;

    protected $table = "tipo_cuenta";

    protected $primaryKey = "id_tipo_cuenta";

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, 'tipo_cuenta_id', 'id_tipo_cuenta');
    }
}
