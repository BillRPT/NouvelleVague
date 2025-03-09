<?php

namespace App\Controllers;

use App\Models\Monmodele;

class c_Evenement extends BaseController
{
    public function index()
    {
        // Chargement du modèle
        $monModele = new Monmodele();
        
        // Récupération des événements
        $evenements = $monModele->recupererEvenements();
        
        // Passer les événements à la vue
        return view('v_Accueil', ['evenements' => $evenements]);
    }

}
?>