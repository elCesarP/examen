<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Rol;

class rolController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Rol());
    }
}
