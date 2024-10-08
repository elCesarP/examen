<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comentario;

class comentarioController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Comentario());
    }

    public function getComentarioOne(Request $request, $usuarioId)
    {
        $comentarios = Comentario::where('usuario_id', $usuarioId)
            ->with('usuario')
            ->get();

        return response()->json($comentarios);
    }

    public function getComentarioAll(Request $request)
    {
        $comentarios = Comentario::with('usuario')->get();

        return response()->json($comentarios);
    }
}
