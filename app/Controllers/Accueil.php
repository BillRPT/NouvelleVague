<?php

namespace App\Controllers;

class Accueil extends BaseController
{
    public function index()
    {
        return view('v_Header.php').view('v_BouttonConnexion.php').view('v_Accueil.php');
    }
}
