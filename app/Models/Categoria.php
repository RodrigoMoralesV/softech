<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categoria";

    protected $primaryKey = "id_categoria";

    public function producto(){
        return $this->hasMany(Producto::class, 'categoria_id', 'id_categoria');
    }
}
