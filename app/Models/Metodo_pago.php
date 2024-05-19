<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_pago;

class Metodo_pago extends Model
{
    use HasFactory;

    protected $table = "metodo_pago";

    protected $primaryKey = "id_metodo_pago";

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, 'metodo_pago_id', 'id_metodo_pago');
    }
}
