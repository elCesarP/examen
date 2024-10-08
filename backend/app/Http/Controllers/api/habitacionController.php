<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Habitacion;

class habitacionController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Habitacion());
    }
}
