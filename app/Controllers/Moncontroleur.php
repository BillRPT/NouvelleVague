<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        //Vérifier si il est co ou pas 
        if (isset($_SESSION['user'])) {
            if ($_SESSION['role'] == "maire" || $_SESSION['role'] == "secretaire") {
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