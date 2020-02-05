<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReferidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Referidos()
    {

        return view('dashboard.referidos' , compact('usuarios'));
    }
}
