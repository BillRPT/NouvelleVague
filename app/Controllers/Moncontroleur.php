<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    public function index() {

        //Mettre par défault uc a accueil
        $uc = $this->request->getVar('uc') ?? 'accueil';

        switch($uc) {
            case 'accueil': {
                return view('v_Accueil.php');
            }
            case 'connexion': {
                return redirect()->to(base_url('c_Connexion/afficherConnexion'));
            }
        }
    }
}

?>