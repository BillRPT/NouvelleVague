<?php
namespace App\Controllers;

class c_Connexion extends BaseController {

    // Points d'entrée du contrôleur
    public function index() {
        return view('v_Connexion.php');
    }

    // Méthode de connexion de l'utilisateur
    public function connexionUtilisateur() {
        // Déclarer le modèle ici
        $monModele = new \App\Models\Monmodele();

        // Récupérer les champs saisis par l'utilisateur
        $login = $this->request->getPost('login');
        $mdp = $this->request->getPost('password');

        if (empty($login) || empty($mdp)) {
            return view('v_Connexion.php').view('v_ChampVide.php');
        } else {
            // Appliquer la méthode Connexion du Modèle et hasher le mot de passe
            $nb = $monModele->Connexion($login, md5($mdp));

            // Si nb est == 1, cela signifie que la connexion a réussi
            if ($nb == 1) {
                // Récupérer le rôle de l'utilisateur
                $getRole = $monModele->getRole($login);

                // Mettre dans le payload
                $info = [
                    'user'  => $login,
                    'role' => $getRole,
                ];

                // Créer la variable de session et ajouter le payload à cette variable de session
                $this->session->set($info);

                // Ajouter le log de connexion
                $this->addConnectionLog($login, $monModele, 'connexion', 'Connexion réussie');

                // Rediriger vers le contrôleur principal (accueil)
                return redirect()->to('/');
            } else {
                return view('v_Connexion.php').view('v_ErreurConnexion.php');
            }
        }
    }

    // Fonction de déconnexion de l'utilisateur
    public function deconnexionUtilisateur() {
        // Récupérer l'utilisateur actuellement connecté à partir de la session
        $user = $this->session->get('user');  // Assure-toi que 'user' existe dans la session

        // Vérifie si l'utilisateur est connecté avant de tenter d'ajouter un log
        if ($user) {
            // Enregistrer un log de déconnexion
            $monModele = new \App\Models\Monmodele();
            $this->addConnectionLog($user, $monModele, 'deconnexion', 'Déconnexion réussie');

            // Détruire la session de l'utilisateur
            $this->session->destroy();
        }

        // Rediriger vers la page d'accueil
        return redirect()->to('/');
    }

    // Méthode pour ajouter un log de connexion/déconnexion
    private function addConnectionLog($login, $monModele, $action) {
        // Récupérer les détails de l'utilisateur pour enregistrer le log
        $user = $monModele->getUserByLogin($login);

        // Enregistrer le log dans la base de données
        $monModele->addLog($user['idUser'], $action);
    }
}


?>