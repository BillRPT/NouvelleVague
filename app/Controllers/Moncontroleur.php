<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        return view('v_Accueil.php');
        }
    }

?>