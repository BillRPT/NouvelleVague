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

        //Récupérer les champs saisie par l'utilisateur
        $login = $this->request->getPost('login');
        $mdp = $this->request->getPost('password');

        if (empty($login) || empty($mdp)) {
            return view('v_Connexion.php').view('v_ChampVide.php');
        }
        else {
            //Appl la méthode Connexion du Modèle et hasher le mdp
            $nb = $monModele->Connexion($login, md5($mdp));

            //Si nb est == 1 ca veux dire que la connexion a reussie
            if ($nb == 1) {
                //Créer un tableau pour l'ajouter a la variable de session

                //Récup le role de l'utilisateur
                $getRole = $monModele->getRole($login);

                //Mettre dans le payload
                $info = [
                    'user'  => $login,
                    'role' => $getRole,
                ];


                //Créer la variable de session et ajouter le payload a cette variable de session
                $this->session->set($info);

                //et rediriger vers le controleur principal qui est le controleur de l'accueil
                return redirect()->to('/');
            }
            else {
                return view('v_Connexion.php').view('v_ErreurConnexion.php');
            }
        }
    }

    //Fonction qui va permettre a l'utilisateur de se déconnecter -> https://codeigniter.com/user_guide/libraries/sessions.html
    public function deconnexionUtilisateur() {
        //La détruire
        $this->session->destroy();
        //rediriger vers la page d'accueil
        return redirect()->to('/');
    }


}

?>