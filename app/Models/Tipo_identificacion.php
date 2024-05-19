<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Tipo_identificacion extends Model
{
    use HasFactory;

    protected $table = "tipo_identificacion";

    protected $primaryKey = "id_tipo_identificacion";

    public function cliente(){
        return $this->hasMany(Cliente::class, 'tipo_identificacion_id', 'id_tipo_identificacion');
    }
}
