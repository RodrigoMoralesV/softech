<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Marca extends Model
{
    use HasFactory;

    protected $table = "marca";

    public function producto(){
        return $this->hasMany(Producto::class, 'marca_id', 'id_marca');
    }
}
