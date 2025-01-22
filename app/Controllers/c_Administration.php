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
                return view('v_MairePanel.php');
                break;
        }
    }

}