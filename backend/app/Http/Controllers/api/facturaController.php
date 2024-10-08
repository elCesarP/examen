<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Factura;
use App\Models\Habitacion;
use App\Models\Usuario;
use App\Models\Reserva;

class facturaController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Factura());
    }

    public function getFacturaOne(Request $request, $usuarioId)
    {
        $facturas = Factura::where('usuario_id', $usuarioId, 'habitacion_id', $habitacionId, 'reserva_id', $reservaId)
            ->with('usuario', 'habitacion', 'reserva')
            ->get();

        return response()->json($facturas);
    }

    public function getFacturaAll(Request $request)
    {
        $facturas = Factura::with('usuario', 'habitacion', 'reserva')->get();

        return response()->json($facturas);
    }

    public function crear(Request $request)
    {
        $validatedData = $request->validate([
            'reserva_id' => 'nullable|exists:reserva,id',
            'servicio_id' => 'nullable|exists:servicio,id',
            'habitacion_id' => 'required|exists:habitacion,id',
            'usuario_id' => 'required|exists:usuario,id',
            'codigo_factura' => 'required|string|max:255',
        ]);

        $factura = Factura::create($validatedData);

        return response()->json($factura, 201);
    }
}
