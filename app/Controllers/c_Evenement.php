<?php

namespace App\Controllers;

use App\Models\Monmodele;

class c_Evenement extends BaseController
{
    public function index()
    {
        // Chargement du modèle
        $monModele = new Monmodele();

        // Récupération des événements depuis le modèle
        $evenements = $monModele->getEvenements();

        if (empty($evenements)) {
            echo "Aucun événement trouvé";
            return;
        }

        // Passer les événements à la vue
        return view('v_Accueil', ['evenements' => $evenements]);
    }
}


?>