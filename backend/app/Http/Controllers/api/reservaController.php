<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Usuario;  

class reservaController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Reserva());
    }

    public function getReservaOne(Request $request, $usuarioId)
    {
        $reservas = Reserva::where('usuario_id', $usuarioId, 'habitacion_id', $habitacionId)
            ->with('usuario', 'habitacion')
            ->get();

        return response()->json($reservas);
    }

    public function getReservaAll(Request $request)
    {
        $reservas = Reserva::with('usuario', 'habitacion')->get();

        return response()->json($reservas);
    }

    public function createReserva(Request $request)
    {
        $reserva = Reserva::create($request->all());

        $habitacion = Habitacion::find($request->habitacion_id);
        $habitacion->disponible = false;
        $habitacion->save();

        return response()->json($reserva, 201);
    }
    
}
