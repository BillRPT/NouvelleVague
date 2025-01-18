<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        return view('v_Header.php').view('v_BouttonConnexion.php').view('v_Accueil.php');
    }
}

?>