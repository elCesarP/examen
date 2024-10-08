<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Servicio;
use App\Models\Usuario;

class servicioController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Servicio());
    }

    public function getServicioOne(Request $request, $servicioId)
    {
        $servicio = Servicio::where('id', $servicioId)
            ->with('usuario')
            ->get();

        return response()->json($servicio);
    }

    public function getServicioAll(Request $request)
    {
        $servicios = Servicio::with('usuario')->get();

        return response()->json($servicios);
    }
}
