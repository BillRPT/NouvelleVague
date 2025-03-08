<?php

namespace App\Controllers;

use App\Models\Monmodele;
use CodeIgniter\Controller;

class c_Profil extends Controller
{
    protected $session;
    protected $model;

    public function __construct()
    {
        
        $this->session = session();
        
        $this->model = new Monmodele();
    }

    /**
     * Page principale du profil : affiche les infos de l’utilisateur + ses réservations
     */
    public function index()
    {
      
        if (!$this->session->has('user')) {
            return redirect()->to('/c_Connexion');
        }

       
        $login = $this->session->get('user');

        
        $utilisateur = $this->model->getUserByLogin($login);

       
        if (!$utilisateur) {
            return redirect()->to('/c_Connexion')->with('error', 'Utilisateur non trouvé.');
        }

        // Utilise l'ID de l'utilisateur pour récupérer ses réservations
        $reservations = $this->model->getReservationsByUser($utilisateur['idUser']);

        //Récupérer le nombre de personne que j'ai parrainer
        $nbdepersonneParrainer =  $this->model->nbpersonneParrainer($utilisateur['idUser']);
        
        $data = [
            'utilisateur' => $utilisateur,
            'reservations' => $reservations,
            'nbdepersonneParrainer' => $nbdepersonneParrainer
        ];

        // Charge la vue "v_Profil.php"
        return view('v_Profil', $data);
    }

    /**
     * Méthode pour mettre à jour le profil
     */
    public function update()
    {
       
        if (!$this->session->has('user')) {
            return redirect()->to('/c_Connexion');
        }

        
        $login = $this->session->get('user');

       
        $utilisateur = $this->model->getUserByLogin($login);

        if (!$utilisateur) {
            return redirect()->to('/c_Connexion')->with('error', 'Utilisateur non trouvé.');
        }

        
        $newData = [
            'nomUser'     => $this->request->getPost('nomUser'),
            'prenomUser'  => $this->request->getPost('prenomUser'),
            'adresseUser' => $this->request->getPost('adresseUser'),
           
        ];

        
        $this->model->updateUser($utilisateur['idUser'], $newData);

        
        $this->session->setFlashdata('success', 'Profil mis à jour avec succès.');

        // Redirige vers la page profil
        return redirect()->to('/c_Profil');
    }

    /**
     * Annule une réservation si on est à plus de 48h de l'événement
     *
     * @param int $idResa
     */
    public function annulerReservation($idResa)
{
    // Vérifie si l'utilisateur est connecté (clé de session = 'user')
    if (!$this->session->has('user')) {
        return redirect()->to('/c_Connexion');
    }

    // Récupère le login de l'utilisateur depuis la session
    $login = $this->session->get('user');

    // Récupère l'utilisateur pour obtenir son idUser
    $utilisateur = $this->model->getUserByLogin($login);
    if (!$utilisateur) {
        return redirect()->to('/c_Connexion')->with('error', 'Utilisateur non trouvé.');
    }

    // Récupère la réservation
    $reservation = $this->model->getReservation($idResa);

    // Vérifie que la réservation existe et appartient à l'utilisateur
    if (!$reservation || $reservation->idUser != $utilisateur['idUser']) {
        return redirect()->to('/c_Profil')
                         ->with('error', 'Accès interdit ou réservation inexistante.');
    }

    // Vérifie la contrainte des 48h avant l’événement
    // On suppose que la colonne "dateEvenement" existe dans la table "resaevenements"
    $eventTimestamp = strtotime($reservation->dateEvenement);
    $now = time();
    $diff = $eventTimestamp - $now;

    // 172800 secondes = 48h
    if ($diff >= 172800) {
        // OK pour annuler
        $this->model->deleteReservation($idResa);
        return redirect()->to('/c_Profil')
                         ->with('success', 'Réservation annulée avec succès.');
    } else {
        return redirect()->to('/c_Profil')
                         ->with('error', 'Impossible d’annuler moins de 48h avant l’événement.');
    }
}
    
}
