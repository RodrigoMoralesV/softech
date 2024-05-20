<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Embalaje extends Model
{
    use HasFactory;

    protected $table = "embalaje";

    protected $primaryKey = "id_embalaje";

    public function producto(){
        return $this->hasMany(Producto::class, 'embalaje_id', 'id_embalaje');
    }
}
