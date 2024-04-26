<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Cliente;

class Ciudad extends Model
{
    use HasFactory;

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function cliente(){
        return $this->hasMany(Cliente::class);
    }
}
