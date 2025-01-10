<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    public function index() {
        //Retourne la vue d'accueil dans le controleur
       //return view('v_Accueil.php');
       //return view('v_Connexion.php');
       $_REQUEST['uc'] = "accueil";

       $uc = $_REQUEST['uc'];

       switch($uc) {
            case 'accueil':{
                return view('v_Accueil.php');
            }
       }
    }
}

?>