<?php

namespace App\Controllers;

class c_Administration extends BaseController{

    public function index() {
        
        $role = $_SESSION['role'];
        
        //Faire un switch pour rediriger l'utilisateur en fonction de son rôle (maire ou secretaire)
        switch ($role) {
            case 'secretaire':
                echo 'secretaire';
                break;
            case 'maire':
                return view('v_MairePanel.php').view('v_finFooter.php');
                break;
        }
    }

    //Fonction qui permet de retourner la vue pour voir les inscription au evenements
    public function inscriptionEvenement() {

        $monModele = new \App\Models\Monmodele();

        $nb = $monModele->nbEvenements();

        if ($nb == 0) {
            return view('v_MairePanel.php').view('v_AucunEvenements.php').view('v_finFooter.php');
        }
        else {
            return view('v_ConsultationInscriptionEvenement.php');
        }
    }

}