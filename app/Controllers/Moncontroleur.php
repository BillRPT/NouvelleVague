<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    public function index() {
        //Retourne la vue d'accueil dans le controleur
        return view('v_Accueil.php');
    }
}

?>