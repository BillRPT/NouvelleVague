<?php
namespace App\Controllers;

class c_Connexion extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        return view('v_Connexion.php');
    }


    public function connexionUtilisateur() {
        //Déclarer le modele ici
        $monModele = new \App\Models\Monmodele();

        //Récupérer les champs sasie par l'utilisateur
        $email = $this->request->getPost('login');
        $mdp = $this->request->getPost('password');

        if (empty($email) || empty($mdp)) {
            return view('v_Connexion.php').view('v_ChampVide.php');
        }
        else {
            //Appl la méthode Connexion du Modèle et hasher le mdp
            $nb = $monModele->Connexion($email, md5($mdp));

            //Si nb est == 1 ca veux dire que la connexion a reussie
            if ($nb == 1) {
                return view('v_Connexion.php').view('v_SuccesConnexion.php');
            }
            else {
                return view('v_Connexion.php').view('v_ErreurConnexion.php');
            }
        }
    }


}

?>