<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estatus;


class EstatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify');
    }
    public function estatus()
    {
        $data = Estatus::all();
//        return true;
        return $data;
    }
}
