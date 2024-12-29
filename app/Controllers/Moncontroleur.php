<?php
namespace App\Controllers;

class Moncontroleur extends BaseController{

    public function index() {
        return view('mavue.php').view('mavue2.php');
    }

    public function init() {
        $data = ['liste' => ["Pomme", "Raisin", "Orange"]];
        return $data;
    }

    public function mafonctiondeTest($param1 = false, $param2 = false, $param3 = false) {
        echo 'Affichage des paramètres ' . $param1 . ' ' . $param2 . ' ' . $param3;
    }

    public function testConnexion() {
        $monModele = new \App\Models\Monmodele();

        if ($this->request->is('post')) { 
            $user = $this->request->getPost('username');
            $email = $this->request->getPost('email');

            $nb = $monModele->Connexion($user, $email);

            if ($nb == 1) {
                //Ajt la user a la variable de session (pas de start)
                $this->session->set('user', $user);
                return view('mavue.php').view('mavue2.php');
            }
            else {
                return view('erreur.php').view("v_Connexion.php");
            }
        }
        else {
            return view("v_Connexion.php");
        }

        //echo $monModele->Connexion($user, $email);

    }

    public function ajouterContacts() {
        $monModele = new \App\Models\Monmodele();

        //Définition des régles
        $rules = [
            'username' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[10]',
            'email' => 'required|max_length[254]|valid_email',
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            //Récupération de tous les champs qui ont été saisis
            //$validData = $this->validator->getValidated();

            //Récup la saisie de l'utilisateur
            /*$user = $validData['username'];
            $email = $validData['email'];
            $mdp = $validData['password'];*/

            $user = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $mdp = $this->request->getPost('password');

            $monModele->ajouterunContact($user, $email, $mdp);
            return view('success').view('mavue.php').view('v_Ajouter.php');
        }
        else {
            return view('mavue.php').view('v_Ajouter.php');
        }
    }

    public function lesContacts() {

        $monModele = new \App\Models\Monmodele();

        $data['lescontacts'] = $monModele->getLesContacts();

        return view('mavue.php').view('v_lesContacts.php', $data);
    }

    public function nbContacts() {

        $monModele = new \App\Models\Monmodele();

        $nbClient['nbContacte'] = $monModele->getnbContacts();

        return view('mavue.php').view('v_nombreContacts.php', $nbClient);
    }
}

?>