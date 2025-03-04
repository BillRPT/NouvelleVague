<?php
namespace App\Controllers;

class c_Inscription extends BaseController{

    //Points d'entrer du controleur
    public function index() {
        return view('v_Inscription.php');
    }

    public function inscriptionUtilisateur() {

        // Déclarer le modèle ici
        $monModele = new \App\Models\Monmodele();
    
        // Règles à respecter
        $rules = [
            'login' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[10]',
            'email' => 'required|max_length[254]|valid_email',
        ];
    
        // Récupérer tous les champs pour les passer en paramètre lors de l'appel de la fonction
        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $adresse = $this->request->getPost('adresse');
        $login = $this->request->getPost('login');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $codeParrainageAmis = $this->request->getPost('codeParrainage');
    
        $fonction = new \Config\Fonction();
    
        // Vérification des champs vides
        if (empty($nom) || empty($prenom) || empty($adresse) || empty($login) || empty($email) || empty($password)) {
            return view('v_Inscription.php').view('v_ChampVide.php');
        }
    
        // Cas avec code de parrainage
        if (!empty($codeParrainageAmis)) {
            // Vérifier si c'est un ancien habitant
            $roleUser = $monModele->verificationAncienneter($codeParrainageAmis);
    
            if ($roleUser == NULL) {
                return view('v_Inscription.php').view("v_CodeParrainageInexistant.php");
            } 
    
            if ($roleUser == "arrivant") {
                return view('v_Inscription.php').view("v_UtilisateurNonAnciens.php");
            }
    
            // Cas sans code de parrainage
            $nb = $monModele->utilisateurExistant($email, $login);
    
            if ($this->validate($rules)) {
                if ($nb != 1) {
                    // Générer le code de parrainage
                    $codeParrainage = $fonction->generateCode();
                    $monModele->Inscription($nom, $prenom, $email, md5($password), $adresse, $login, $codeParrainage);

                    $nomComplet = $nom . ' ' . $prenom;

                    // Enregistrer le fait qu'un ancien habitant a parrainé un utilisateur
                    $monModele->parrainageUtilisateur($nomComplet);
                    // Obtenir l'utilisateur du code de parrainage
                    $idUser = $monModele->ProprietaireCode($codeParrainageAmis);
                    // Enregistrer dans la table "parrainage_effectuer" pour savoir qui a parrainé qui
                    $monModele->insertParrainage($idUser);
                    return view('v_Inscription.php').view('v_SuccesInscription.php');
                } else {
                    return view('v_Inscription.php').view('v_erreurDuplication.php');
                }
            } else {
                return view('v_Inscription.php').view('v_Regle.php');
            }
    
        } else {
            // Cas sans code de parrainage
            $nb = $monModele->utilisateurExistant($email, $login);
    
            if ($this->validate($rules)) {
                if ($nb != 1) {
                    // Générer le code de parrainage
                    $codeParrainage = $fonction->generateCode();
                    $monModele->Inscription($nom, $prenom, $email, md5($password), $adresse, $login, $codeParrainage);
                    return view('v_Inscription.php').view('v_SuccesInscription.php');
                } else {
                    return view('v_Inscription.php').view('v_erreurDuplication.php');
                }
            } else {
                return view('v_Inscription.php').view('v_Regle.php');
            }
        }
    }
    
}

?>