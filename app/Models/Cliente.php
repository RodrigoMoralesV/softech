<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Cliente as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Ciudad;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        // 'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $table = "cliente";

    protected $primaryKey = "id_cliente";

    protected function ciudad(){
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'id_ciudad');
    }

    public function documento(){
        return $this->hasMany(Documento::class, 'cliente_id', 'id_cliente');
    }
}
