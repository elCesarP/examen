<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Habitacion;
use App\Models\Usuario;
use App\Models\Reserva;
use App\Models\Factura;
use App\Models\Servicio;


class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';

    protected $fillable = [
        'reserva_id',
        'servicio_id',
        'habitacion_id',
        'usuario_id',
        'codigo_factura'
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
