<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Empresa extends Model
{
    use HasFactory;

    public function documento(){
        return $this->hasMany(Documento::class);
    }
}
