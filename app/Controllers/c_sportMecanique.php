<?php

namespace App\Controllers;

class c_sportMecanique extends BaseController
{
    public function index()
    {
        // Charge la vue pour la page sport mécanique 
        return view('v_sportMecanique');
    }
}
