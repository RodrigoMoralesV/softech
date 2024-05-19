<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Cliente;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = "ciudad";

    protected $primaryKey = "id_ciudad";

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id_departamento');
    }

    public function cliente(){
        return $this->hasMany(Cliente::class, 'ciudad_id', 'id_ciudad');
    }
}
