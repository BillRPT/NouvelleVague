<?php

namespace App\Controllers;

use App\Models\Monmodele;
use CodeIgniter\Controller;

class c_Reservation extends BaseController
{
    /**
     * Affiche la page de réservation (vue v_Reservation).
     */
    public function index()
    {
        return view('v_Reservation'); // Charge la vue
    }

    /**
     * Teste la connexion à la base de données
     */
    public function testConnexion()
    {
        $db = \Config\Database::connect();

        if (!$db) {
            return "Erreur de connexion à la base de données.";
        } else {
            return "Connexion réussie !";
        }
    }

    /**
     * Retourne la liste des tables de la base de données (debug)
     */
    public function testTables()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SHOW TABLES");
        $result = $query->getResultArray();

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }

    /**
     * Retourne la liste des événements en JSON pour FullCalendar.
     */
    public function getEventsJson()
    {
        $model = new Monmodele();
        $evenements = $model->recupererEvenements();

        $data = [];
        foreach ($evenements as $evt) {
            $data[] = [
                'id'    => $evt['idGestion'],
                'title' => $evt['nomEvenement'],
                'start' => $evt['dateEvenement'],
                'extendedProps' => [
                    'nbplaceDispo' => $evt['nbplaceDispo']
                ]
            ];
        }

        return $this->response->setJSON($data);
    }

    /**
     * Reçoit le formulaire final, vérifie et insère la réservation.
     */
    public function finaliserReservation()
    {
        // Récupérer les champs POST
        $idEvenement = $this->request->getPost('idEvenement');
        $nbBillets   = (int)$this->request->getPost('nbBillets');
        $nomComplet  = $this->request->getPost('nomComplet');
        $email       = $this->request->getPost('email');

        // Appel du modèle
        $model = new Monmodele();
        $event = $model->recupererunEvenement($idEvenement);

        if (!$event) {
            return "Erreur : Événement introuvable.";
        }

        // Vérifier la date
        if ($event['dateEvenement'] < date('Y-m-d')) {
            return "Impossible de réserver un événement déjà passé.";
        }

        // Vérifier nbplaceDispo
        $placesDispo = (int)$event['nbplaceDispo'];
        if ($nbBillets > $placesDispo) {
            return "Impossible de réserver plus de $placesDispo places.";
        }

        // Exemple : ID utilisateur si session
        $idUser = $_SESSION['user'] ?? 0;

        // Insérer la réservation
        $model->addReservation(
            $idUser,
            $idEvenement,
            $nomComplet,
            date('Y-m-d H:i:s'),
            "Standard",
            $nbBillets
        );

        // Mettre à jour le nombre de places
        $nouveauNb = $placesDispo - $nbBillets;
        $model->updatePlacesDispo($idEvenement, $nouveauNb);

        // Retourne une vue de succès
        return view('v_ReservationSuccess', [
            'idEvenement' => $idEvenement,
            'nomComplet'  => $nomComplet,
            'email'       => $email,
            'nbBillets'   => $nbBillets
        ]);
    }
}
