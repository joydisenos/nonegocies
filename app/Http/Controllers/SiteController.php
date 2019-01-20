<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function inicio()
    {
    	return view('inicio');
    }

    public function terminos()
    {
    	return view('terminos');
    }

    public function privacidad()
    {
    	return view('privacidad');
    }

    public function cookies()
    {
    	return view('cookies');
    }
}
