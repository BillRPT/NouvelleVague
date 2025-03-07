<?php
namespace App\Controllers;

use App\Models\Monmodele;
use CodeIgniter\Controller;


class Moncontroleur extends BaseController
{
    /**
     * Affiche la page d'accueil.
     */
  

    //Points d'entrer du controleur
    public function index() {

        $session = session();

        //Vérifier si il est co ou pas 
        if ($this->session->get('user')) {
            if ($session->get('role') == "maire" || $session->get('role') == "secretaire") {
                return view('v_Header.php').view('v_BouttonDeconnexion.php').view('v_BouttonAdministration.php').view('v_Accueil.php');
            }
            else {
                return view('v_Header.php').view('v_BouttonDeconnexion.php').view('v_Accueil.php');
            }
        } else {
            // Utilisateur non connecté
            return view('v_Header')
                 . view('v_BouttonConnexion')
                 . view('v_Accueil');
        }
    }

    /**
     * Affiche la page de réservation.
     */
    public function reservation()
    {
        $model = new Monmodele();
        // Récupérer la liste des événements
        $data['evenements'] = $model->recupererEvenements();

        // Afficher la vue de réservation avec les données récupérées
        return view('v_Reservation', $data);
    }

    /**
     * Traite la soumission du formulaire de réservation.
     */
    public function reserve()
    {
        helper(['form']);

        // Règles de validation
        $rules = [
            'name'     => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
            'event_id' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            // En cas d'erreur, recharger la vue de réservation avec les erreurs
            $model = new Monmodele();
            $data['evenements'] = $model->recupererEvenements();
            $data['validation'] = $this->validator;

            return view('v_Reservation', $data);
        } else {
            // Récupérer l'identifiant de l'événement
            $eventId = $this->request->getPost('event_id');
            $model   = new Monmodele();

            // (Optionnel) Vérifier si l'événement est complet via une méthode du modèle
            // ex: $isComplet = $model->isEvenementComplet($eventId);

            // Préparer les données pour la réservation
            $idUser           = isset($_SESSION['user']) ? $_SESSION['user'] : 0;
            $nomReservation   = $this->request->getPost('name');
            $dateReservation  = date('Y-m-d H:i:s');
            $typeReservation  = "Standard"; // exemple
            $nbplaceTotale    = 1;         // réserver 1 place par défaut

            // Enregistrer la réservation
            $model->addReservation(
                $idUser,
                $eventId,
                $nomReservation,
                $dateReservation,
                $typeReservation,
                $nbplaceTotale
            );

            // Afficher la vue de confirmation
            return view('v_ReservationSuccess');
        }
    }
}
