<?php

namespace App\Controllers;

class c_Administration extends BaseController{

    /**
     * Le point d'entrer de l'application
     */
    public function index() {

        $session = session();

        if ($this->session->get('user')) {
            $role = $_SESSION['role'];
        
        //Faire un switch pour rediriger l'utilisateur en fonction de son rôle (maire ou secretaire)
            switch ($role) {
                case 'secretaire':
                    return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_finFooter.php');
                    break;
                case 'maire':
                    return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_finFooter.php');
                    break;
            }
        }
        else {
            return view('v_Header.php').view('v_BouttonConnexion.php').view('v_Accueil.php');
        }
    }

    
    /**
     * Fonction qui permet de retourner la vue pour voir les inscription au evenements
     * 
     * @return une vue
     */
    public function inscriptionEvenement() {

        $monModele = new \App\Models\Monmodele();
        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $nb = $monModele->nbEvenements();

        if ($nb == 0) {
            return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_AucunEvenements.php').view('v_finFooter.php');
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
                    $unEvent['descriptionEvenement'],
                    $unEvent['nbplaceDispo'],
                    $unEvent['dureeEvenement'],
                    $unEvent['nbplaceMax'],
                    $unEvent['statutEvenement'],
                    $lien
                );
            }

            //Le générer 
            $data['table'] = $table->generate();

            return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_ConsultationEvenement.php', $data).view('v_finFooter.php');
        }
    }

    /**
     * Permet d'obtenir la liste des participants
     * 
     * @param bool $param
     * 
     * @return une vue
     */
    public function listeparticipantEvenement($param = false) {
        $monModele = new \App\Models\Monmodele();

        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $data['lesParticipants'] = $monModele->listedesparticipantEvenements($param);

        if (count($data['lesParticipants']) == 0) {
            return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_AucunParticipant.php').view('v_finFooter.php');
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


            return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_ListeParticipantEvenement.php', $data).view('v_finFooter.php');
        }
    }


    /**
     * Récupérer les événements les plus solicités
     * 
     * @return une vue
     */
    public function lesevenementsPopulaire() {
        $monModele = new \App\Models\Monmodele();

        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $data['lesevenements'] = $monModele->evenementsPopulaire();


        //En tête du tableau
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


        return view('v_MairePanel.php').view('v_BouttonRetour.php').view('v_EvenementPopulaire.php', $data).view("v_BouttonPdf.php").view('v_finFooter.php');
    }

    /**
     * Permet de creer un evenement
     * 
     * @return une vue
     */
    public function creerEvenements() {

        $monModele = new \App\Models\Monmodele();

        //Récupérer les types d'event pour les mettres dans une liste déroulante

        $typeEvent['lestypeEvenements'] = $monModele->gettypeEvenement();


        //Si la req est en post alors cela signifie la validation du formulaire
        if ($this->request->is('post')) {
            $nom = $this->request->getPost('nom');
            $date = $this->request->getPost('date');
            $description = $this->request->getPost('description');
            $nombrePlace = $this->request->getPost('nbPlace');
            $duree = $this->request->getPost('duree');
            $typeEvenement = $this->request->getPost('evenement');
            $imageChemin = $this->request->getFile('image');
            //l'incrementer de 1 pour avoir les bonnes valeurs
            $typeEvenement = $typeEvenement + 1;
            //Vérifier que aucun champ n'est vide
            if (empty($nom) || empty($date) || empty($description) || empty($nombrePlace) || empty($duree) || empty($imageChemin->getName())) {
                //Retourner la vue avec un message d'erreur
                return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_FormulaireCreationEvenement.php', $typeEvent).view('v_ChampVide.php').view('v_finFooter.php');
            }
            else {
                //Récup l'id du evenement

                if ($this->chargerImage($this->request->getFile('image')) == false) {
                    return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_FormulaireCreationEvenement.php', $typeEvent).view('v_ErreurImage.php').view('v_finFooter.php');
                }

                $monModele->ajouterEvenement($nom, $date, $description, $nombrePlace, $duree, $typeEvenement, "Image/" . $imageChemin->getName());
                return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_FormulaireCreationEvenement.php', $typeEvent).view('v_MessageCreationEvenement.php').view('v_finFooter.php');
            }
        }
        else {
            return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_FormulaireCreationEvenement.php', $typeEvent).view('v_finFooter.php');
        }
    }

    private function chargerImage($file) {
        $rep = true;

        if (!$file->isValid()) {
            return false;
        }

        // Vérifier l'extension du fichier
        $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file->getExtension(), $extensionsAutorisees)) {
            return false;
        }

        // Définir le dossier de destination
        $cheminFichier = 'Image/';

        // Garder le nom d'origine du fichier
        $nomFichier = $file->getName();
        $cheminComplet = $cheminFichier . $nomFichier;

        // Déplacer le fichier vers le dossier final
        if (!$file->move($cheminFichier, $nomFichier)) {
            return false;
        }

        return $rep;
    } 

    /**
     * Permet de rediriger vers la bonne vue
     * 
     * @return une vue
     */
    public function supprimerEvenement() {

        $monModele = new \App\Models\Monmodele();
        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $nb = $monModele->nbEvenements();

        if ($nb == 0) {
            return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_AucunEvenements.php').view('v_finFooter.php');
        }
        else {
            //Appl la fonction 'recupererEvenements' et stock tout ca dans 'lesEvenements'
            $data['lesEvenements'] = $monModele->recupererEvenements();
    
    
            //Les entetes du tableau
            $table->setHeading('idGestion', 'nomEvenement', 'dateEvenement', 'description', 'nbplaceDispo', 'dureeEvenement', 'nbplaceMax', 'statutEvenement');

            //Ajouter l'event au tableau
            foreach ($data['lesEvenements'] as $unEvent) {

                //Créer un lien pour chaque évenements
                $lien = anchor('supressiondeEvenement/' . $unEvent['idGestion'], 'Supprimer cet événement', ['class' => 'btn btn-primary']);

                //Ajouter les valeurs
                $table->addRow(
                    $unEvent['idGestion'],
                    $unEvent['nomEvenement'],
                    $unEvent['dateEvenement'],
                    $unEvent['descriptionEvenement'],
                    $unEvent['nbplaceDispo'],
                    $unEvent['dureeEvenement'],
                    $unEvent['nbplaceMax'],
                    $unEvent['statutEvenement'],
                    $lien
                );
            }

            //Le générer 
            $data['table'] = $table->generate();


            return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_ConsultationEvenement.php', $data).view('v_finFooter.php');
        }
    }

    /**
     * Permet de supprimer un evenement
     * 
     * @param bool $param
     * 
     * @return une vue
     */
    public function supressiondeEvenement($param) {
        $monModele = new \App\Models\Monmodele();
        //Appel la méthode dans le modele
        $monModele->suppressionEvenement($param);

        //Mettre a jour les status
        $monModele->mettreajourStatut($param);

        return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view("v_SupressionEvenement.php").view('v_finFooter.php');
    }


    /**
     * Permet de modifier un Evenement
     * 
     * @return [type]
     */
    public function modifierEvenement() {

        $monModele = new \App\Models\Monmodele();
        //Pour créer un tableau
        $table = new \CodeIgniter\View\Table();

        $nb = $monModele->nbEvenements();

        if ($nb == 0) {
            return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_AucunEvenements.php').view('v_finFooter.php');
        }
        else {
            //Appl la fonction 'recupererEvenements' et stock tout ca dans 'lesEvenements'
            $data['lesEvenements'] = $monModele->recupererEvenements();

            //Les entetes du tableau
            $table->setHeading('idGestion', 'nomEvenement', 'dateEvenement', 'description', 'nbplaceDispo', 'dureeEvenement', 'nbplaceMax', 'statutEvenement');

            //Ajouter l'event au tableau
            foreach ($data['lesEvenements'] as $unEvent) {

                //Créer un lien pour chaque évenements
                $lien = anchor('modificationdelevenement/' . $unEvent['idGestion'], 'Modifier cet événement', ['class' => 'btn btn-primary']);

                //Ajouter les valeurs
                $table->addRow(
                    $unEvent['idGestion'],
                    $unEvent['nomEvenement'],
                    $unEvent['dateEvenement'],
                    $unEvent['descriptionEvenement'],
                    $unEvent['nbplaceDispo'],
                    $unEvent['dureeEvenement'],
                    $unEvent['nbplaceMax'],
                    $unEvent['statutEvenement'],
                    $lien
                );
            }

            //Le générer 
            $data['table'] = $table->generate();

            return view('v_SecretairePanel.php').view('v_BouttonRetour.php').view('v_ConsultationEvenement.php', $data).view('v_finFooter.php');
        }

    }

    /**Permet de modifier un evenement
     * 
     * @param int $idEvenement
     * 
     * @return [type]
     */
    public function modificationdelevenement($idEvenement) {

        $monModele = new \App\Models\Monmodele();

        //Si c'est une req en post mettre a jour l'evenement
        if ($this->request->is('post')) {

            $nomEvenement = $this->request->getPost('nom');
            $typeEvenement = $this->request->getPost('evenement');
            //l'incrementer de 1 pour avoir les bonnes valeurs
            $typeEvenement = $typeEvenement + 1;
            $dateEvenement = $this->request->getPost('date'); 
            $descriptionEvenement = $this->request->getPost('description');
            $nbplaceMax = $this->request->getPost('nbPlace');
            $dureeEvenement = $this->request->getPost('duree');

            $monModele->updateunEvenement($idEvenement, $nomEvenement, $typeEvenement, $dateEvenement, $descriptionEvenement, $nbplaceMax, $dureeEvenement);
            return view("v_SecretairePanel.php").view('v_BouttonRetour.php').view("v_MessageEvenementAJour.php").view('v_finFooter.php');
        }
        else {
            $data["unEvenement"] = $monModele->recupererunEvenement($idEvenement);

            $data['lestypeEvenements'] = $monModele->gettypeEvenement();

            //Ajouter le id Evenement au tableau
            $data['idEvenement'] = $idEvenement;

            return view("v_SecretairePanel.php").view('v_BouttonRetour.php').view("v_ModificationDeEvenement.php", $data).view('v_finFooter.php');
        }

    }

    
    /**
     * Permet de générer un pdf
     * @return [type]
     */
    public function evenementpopulairePdf() {
        $fonction = new \Config\Fonction();
        $monModele = new \App\Models\Monmodele();

        $data['lesEvenements'] = $monModele->evenementsPopulaire();

        return $fonction->generatePdf($data['lesEvenements']);
    }



}