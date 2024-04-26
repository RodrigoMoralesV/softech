<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Detalle_pago;

class Transaccion extends Model
{
    use HasFactory;

    public function documento(){
        return $this->hasMany(Documento::class);
    }

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class);
    }
}
