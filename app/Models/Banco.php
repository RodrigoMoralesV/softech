<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_pago;

class Banco extends Model
{
    use HasFactory;

    protected $table = "banco";

    public function detalle_pago(){
        return $this->hasMany(Detalle_pago::class, 'banco_id', 'id_banco');
    }
}
