<?php

namespace App\Controllers;

class c_Culture extends BaseController
{
    public function index()
    {
        $session = session();

        //Vérfier si l'utilisateur est connecter ou pas
        if ($this->session->get('user')) {
            return view('v_HeaderCulture').view('v_BouttonDeconnexion').view('v_Culture');
        }
        else {
            // Retourne la vue "v_Culture"
            return view('v_HeaderCulture').view('v_BouttonConnexion').view('v_Culture');
        }
    }
}
