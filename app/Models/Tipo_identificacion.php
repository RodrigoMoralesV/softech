<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Tipo_identificacion extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->hasMany(Cliente::class);
    }
}
