<?php

namespace App\Controllers;

class c_sportMecanique extends BaseController
{
    public function index()
    {
        $session = session();

        //Vérfier si l'utilisateur est connecter ou pas
        if ($this->session->get('user')) {
            // Charge la vue pour la page sport mécanique 
            return view('v_HeaderSportMecanique.php').view('v_BouttonDeconnexion').view('v_sportMecanique');
        }
        else {
            return view('v_HeaderSportMecanique.php').view('v_BouttonConnexion').view('v_sportMecanique');
        }
    }
}
