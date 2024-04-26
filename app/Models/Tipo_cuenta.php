<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_pago;

class Tipo_cuenta extends Model
{
    use HasFactory;

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class);
    }
}
