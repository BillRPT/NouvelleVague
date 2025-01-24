<?php

namespace App\Controllers;

class c_Culture extends BaseController
{
    public function index()
    {

        if (isset($_SESSION['user'])) {
            return view('v_HeaderCulture').view('v_BouttonDeconnexion').view('v_Culture');
        }
        else {
            // Retourne la vue "v_Culture"
            return view('v_HeaderCulture').view('v_BouttonConnexion').view('v_Culture');
        }
    }
}
