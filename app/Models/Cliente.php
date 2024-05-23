<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'correo_cliente',
        'tipo_identificacion_id',
        'numero_identificacion_cliente',
        'nombre_cliente',
        'apellido_cliente',
        'clave_cliente',
        'telefono_cliente',
        'direccion_entrega_cliente',
        'fecha_nacimiento_cliente',
        'ciudad_id',
        'estado'
    ];

    protected $hidden = [
        'clave_cliente',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "cliente";

    protected $primaryKey = "id_cliente";

    public function getAuthPassword()
    {
        return $this->clave_cliente;
    }

    public function getAuthIdentifierName()
    {
        return 'correo_cliente';
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'id_ciudad');
    }

    public function documento()
    {
        return $this->hasMany(Documento::class, 'cliente_id', 'id_cliente');
    }
}
