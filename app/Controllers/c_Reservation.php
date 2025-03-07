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
   
    $login = session()->get('user'); 
    if (!$login) {
        return "Utilisateur non connecté.";
    }

    
    $model = new Monmodele();
    $utilisateur = $model->getUserByLogin($login);
    if (!$utilisateur) {
        return "Utilisateur introuvable.";
    }
    $idUser = $utilisateur['idUser'];

   
    $idEvenement = $this->request->getPost('idEvenement');
    $nbBillets   = (int)$this->request->getPost('nbBillets');
    $nomComplet  = $this->request->getPost('nomComplet');
    $email       = $this->request->getPost('email');

    
    $event = $model->recupererunEvenement($idEvenement);
    if (!$event) {
        return "Erreur : Événement introuvable.";
    }
  
    if ($event['dateEvenement'] < date('Y-m-d')) {
        return "Impossible de réserver un événement déjà passé.";
    }

  
    $placesDispo = $model->getnbPlaceDispo($idEvenement);
    if ($nbBillets > $placesDispo) {
        return "Impossible de réserver plus de $placesDispo places.";
    }

    
    $model->addReservation(
        $idUser,
        $idEvenement,
        $nomComplet,
        date('Y-m-d H:i:s'),         
        "Standard",
        $nbBillets
    );

    
    $nouveauNb = $placesDispo - $nbBillets;
    $model->updatePlacesDispo($idEvenement, $nouveauNb);

 
    return view('v_ReservationSuccess', [
        'idEvenement' => $idEvenement,
        'nomComplet'  => $nomComplet,
        'email'       => $email,
        'nbBillets'   => $nbBillets
    ]);
}

}
?>