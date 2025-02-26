<?php
namespace App\Controllers;



class c_Profil extends Controller {

    public function index() {
        $session = session();

        // Vérifie si l'utilisateur est connecté
        if (!$session->has('idUser')) {
            return redirect()->to(base_url('connexion'))->with('error', 'Veuillez vous connecter.');
        }

        // Récupère les infos de l'utilisateur depuis la session
        $idUser = $session->get('idUser');
        $model = new Monmodele();
        $data['user'] = $model->getUserById($idUser);

        return view('v_Profil', $data);
    }
}
