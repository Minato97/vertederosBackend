<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estatus;
use App\Models\Rol;

class RolController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify');
    }
    public function roles()
    {
        $data = Rol::all();
        return $data;
    }

}
