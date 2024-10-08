<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// usuario
require __DIR__.'/api/usuarioRoute.php';

// servicio
require __DIR__.'/api/servicioRoute.php';

// habitacion
require __DIR__.'/api/habitacionRoute.php';

// comentario
require __DIR__.'/api/comentarioRoute.php';

// factura
require __DIR__.'/api/facturaRoute.php';

// reserva
require __DIR__.'/api/reservaRoute.php';

// rol
require __DIR__.'/api/rolRoute.php';

// auth
require __DIR__.'/api/authRoute.php';