<?php

namespace App\Controllers;

class c_Administration extends BaseController{

    public function index() {
        
        $role = $_SESSION['role'];
        
        //Faire un switch pour rediriger l'utilisateur en fonction de son rôle (maire ou secretaire)
        switch ($role) {
            case 'secretaire':
                return view('v_SecretairePanel.php').view('v_finFooter.php');
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
                $lien = anchor('listeparticipantEvenement/' . $unEvent['idGestion'], 'Voir les inscrits', ['class' => 'btn btn-primary']);

                //Ajouter les valeurs
                $table->addRow(
                    $unEvent['idGestion'],
                    $unEvent['nomEvenement'],
                    $unEvent['dateEvenement'],
                    $unEvent['description'],
                    $unEvent['nbplaceDispo'],
                    $unEvent['dureeEvenement'],
                    $unEvent['nbplaceMax'],
                    $unEvent['statutEvenement'],
                    $lien
                );
            }

            //Le générer 
            $data['table'] = $table->generate();

            return view('v_MairePanel.php').view('v_ConsultationEvenement.php', $data).view('v_finFooter.php');
        }
    }

    public function listeparticipantEvenement($param = false) {
        $monModele = new \App\Models\Monmodele();

        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $data['lesParticipants'] = $monModele->listedesparticipantEvenements($param);

        if (count($data['lesParticipants']) == 0) {
            return view('v_MairePanel.php').view('v_AucunParticipant.php').view('v_finFooter.php');
        }
        else {
                //Les entetes du tableau
            $table->setHeading('nomUser', 'prenomUser', 'emailUser', 'adresseUser', 'dateReservation', 'nbplaceTotale', 'statutReservation');
        
            //Ajouter l'event au tableau
            foreach ($data['lesParticipants'] as $unParticipant) {

                //Ajouter les valeurs
                $table->addRow(
                    $unParticipant['nomUser'],
                    $unParticipant['prenomUser'],
                    $unParticipant['emailUser'],
                    $unParticipant['adresseUser'],
                    $unParticipant['dateReservation'],
                    $unParticipant['nbplaceTotale'],
                    $unParticipant['statutReservation'],
                );
            }

            //Le générer 
            $data['table'] = $table->generate();


            return view('v_MairePanel.php').view('v_ListeParticipantEvenement.php', $data).view('v_finFooter.php');
        }
    }


    //Récupérer les événements les plus solicités
    public function lesevenementsPopulaire() {
        $monModele = new \App\Models\Monmodele();

        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $data['lesevenements'] = $monModele->evenementsPopulaire();


        $table->setHeading('nomEvenement', 'dateEvenement', 'Nombre de reservation', 'Nombre de place réservées', 'statutEvenement');


        foreach ($data['lesevenements'] as $unEvenement) {

            //Ajouter les valeurs
            $table->addRow(
                $unEvenement['nomEvenement'],
                $unEvenement['dateEvenement'],
                $unEvenement['nb_reservations'],
                $unEvenement['nb_places_reservees'],
                $unEvenement['statutEvenement'],
            );
        }

        //Le générer 
        $data['table'] = $table->generate();


        return view('v_MairePanel.php').view('v_EvenementPopulaire.php', $data).view('v_finFooter.php');
    }

}