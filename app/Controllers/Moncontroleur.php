<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    //Points d'entrer du controleur
    public function index() {

        $session = session();

        //Vérifier si il est co ou pas 
        if ($this->session->get('user')) {
            if ($session->get('role') == "maire" || $session->get('role') == "secretaire") {
                return view('v_Header.php').view('v_BouttonDeconnexion.php').view("v_MonProfile.php").view('v_BouttonAdministration.php').view('v_Accueil.php');
            }
            else {
                return view('v_Header.php').view('v_BouttonDeconnexion.php').view("v_MonProfile.php").view('v_Accueil.php');
            }
        }
        else {
            return view('v_Header.php').view('v_BouttonConnexion.php').view('v_Accueil.php');
        }
    }
}

?>