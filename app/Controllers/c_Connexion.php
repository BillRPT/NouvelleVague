<?php
namespace App\Controllers;

class c_Connexion extends BaseController{

    public function redirection() {
        $action = $_REQUEST['action'];
        switch($action) {
            case 'demandeConnexion': {
                return view('v_Connexion.php');
            }
        }
    }
}

?>