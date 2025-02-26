<?php

namespace App\Controllers;


class c_Reservation extends Controller {

    public function index() {
        $session = session();

        // Vérifier si l'utilisateur est connecté
        if (!$session->has('idUser')) {
            return redirect()->to(base_url('connexion'))->with('error', 'Veuillez vous connecter.');
        }

        $idUser = $session->get('idUser');

        $model = new Monmodele();
        $data['reservations'] = $model->getReservationsByUser($idUser) ?? [];

        return view('v_Reservation', $data);
    }

    public function reserver() {
        $session = session();

        // Vérifier si l'utilisateur est connecté
        if (!$session->has('idUser')) {
            return redirect()->to(base_url('connexion'))->with('error', 'Veuillez vous connecter.');
        }

        $idUser = $session->get('idUser');
        $model = new Monmodele();

        // Récupérer les données du formulaire
        $data = [
            'idUser'           => $idUser,
            'nomReservation'   => $this->request->getPost('nomReservation'),
            'dateReservation'  => $this->request->getPost('dateReservation'),
            'typeReservation'  => $this->request->getPost('typeReservation'),
            'nbplaceTotale'    => $this->request->getPost('nbplaceTotale'),
            'statutReservation'=> 'En attente'
        ];

        // Insérer dans la base de données
        $model->addReservation($data);

        return redirect()->to(base_url('c_Reservation'))->with('success', 'Réservation effectuée.');
    }

    public function supprimer($idResa) {
        $session = session();

        // Vérifier si l'utilisateur est connecté
        if (!$session->has('idUser')) {
            return redirect()->to(base_url('connexion'))->with('error', 'Veuillez vous connecter.');
        }

        $model = new Monmodele();
        $model->deleteReservation($idResa);

        return redirect()->to(base_url('c_Reservation'))->with('success', 'Réservation annulée.');
    }

    /**
     * Récupère toutes les réservations pour les afficher dans le calendrier
     */
    public function getReservations() {
        $model = new Monmodele();
        $events = $model->getAllReservations(); // Récupère toutes les réservations
    
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'title' => $event['nomReservation'] . " (" . $event['nbplaceTotale'] . " places)",
                'start' => $event['dateReservation'],
                'backgroundColor' => $this->getColorByType($event['typeReservation']),
                'borderColor' => $this->getColorByType($event['typeReservation'])
            ];
        }
    
        return $this->response->setJSON($data);
    }
    
    // Ajoute une fonction pour définir la couleur selon le type d'événement
    private function getColorByType($type) {
        $colors = [
            'Événement' => '#007bff',   // Bleu
            'Spectacle' => '#28a745',   // Vert
            'Sport' => '#ffc107'        // Jaune
        ];
        return $colors[$type] ?? '#6c757d'; // Gris par défaut
    }
    
}
