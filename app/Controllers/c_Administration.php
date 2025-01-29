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
        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $nb = $monModele->nbEvenements();

        if ($nb == 0) {
            return view('v_MairePanel.php').view('v_AucunEvenements.php').view('v_finFooter.php');
        }
        else {

            //Appl la fonction 'recupererEvenements' et stock tout ca dans 'lesEvenements'
            $data['lesEvenements'] = $monModele->recupererEvenements();

            //Les entetes du tableau
            $table->setHeading('idGestion', 'nomEvenement', 'dateEvenement', 'description', 'nbplaceDispo', 'dureeEvenement', 'nbplaceMax', 'statutEvenement');

            //Ajouter l'event au tableau
            foreach ($data['lesEvenements'] as $unEvent) {

                //Créer un lien pour chaque évenements
                $lien = anchor('inscription/liste/' . $unEvent['idGestion'], 'Voir les inscrits', ['class' => 'btn btn-primary']);

                //Ajouter les valeurs
                $table->addRow(
                    $unEvent['idGestion'],
                    $unEvent['nomEvenement'],
                    $unEvent['dateEvenement'],
                    $unEvent['descrption'],
                    $unEvent['nbplaceDispo'],
                    $unEvent['dureeEvenement'],
                    $unEvent['nbplaceMax'],
                    $unEvent['statutEvenement'],
                    $lien
                );
            }

            //Le générer 
            $data['table'] = $table->generate();

            return view('v_MairePanel.php').view('v_ConsultationInscriptionEvenement.php', $data).view('v_finFooter.php');
        }
    }

}