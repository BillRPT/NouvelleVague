<?php
namespace App\Controllers;

class c_Inscription extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        return view('v_Inscription.php');
    }

    public function inscriptionUtilisateur() {

         //Déclarer le modele ici
        $monModele = new \App\Models\Monmodele();


        //Régles a respecter
        $rules = [
            'login' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[10]',
            'email' => 'required|max_length[254]|valid_email',
        ];

        //Récupérer tous les champs pour les faires passer en para lors de l'apl de la fonction
        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $adresse = $this->request->getPost('adresse');
        $login = $this->request->getPost('login');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $codeParrainageAmis = $this->request->getPost('codeParrainage');

        $fonction = new \Config\Fonction();

        if (empty($nom) || empty($prenom) || empty($adresse) || empty($login) || empty($email) || empty($password)) {
            return view('v_Inscription.php').view('v_ChampVide.php');
        }
        else {
            if (!empty($codeParrainageAmis)) {
                //Vérifier que c'est un ancien habitant
                $roleUser = $monModele->verificationAncienneter($codeParrainageAmis);

                if ($roleUser == NULL) {
                    return view('v_Inscription.php').view("v_CodeParrainageInexistant.php");
                }
                else {
                    if ($roleUser == "arrivant") {
                        return view('v_Inscription.php').view("v_UtilisateurNonAnciens.php");
                    }
                    else {
                        
                    }
                }
            }
            else {
                $nb = $monModele->utilisateurExistant($email, $login);

            if($this->validate($rules)){
                if ($nb != 1) {
                    //Appl la fonction generateCode pour obtenir un code
                    $codeParrainage = $fonction->generateCode();
                    $monModele->Inscription($nom, $prenom, $email, md5($password), $adresse, $login, $codeParrainage);
                    return view('v_Inscription.php').view('v_SuccesInscription.php');
                }
                else {
                    return view('v_Inscription.php').view('v_erreurDuplication.php');
                }
            }
            else {
                return view('v_Inscription.php').view('v_Regle.php');
            }
            }
        }

    }
}

?>