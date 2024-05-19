<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamento";

    protected $primaryKey = "id_departamento";

    public function ciudad(){
        return $this->hasMany(Ciudad::class, 'departamento_id', 'id_departamento');
    }
}
