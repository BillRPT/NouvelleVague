<?php

namespace App\Controllers;

class c_ImmersionForet extends BaseController
{
    public function index()
    {
        $session = session();

        //Vérfier si l'utilisateur est connecter ou pas
        if ($this->session->get('user')) {
            return view('v_HeaderImmersionForet').view('v_BouttonDeconnexion').view('v_ImmersionForet');
        }
        else {
            // Retourne la vue "v_Culture"
            return view('v_HeaderImmersionForet').view('v_BouttonConnexion').view('v_ImmersionForet');
        }

        // Retourne la vue "v_ImmersionForet"
        return view('v_ImmersionForet');
    }
}
