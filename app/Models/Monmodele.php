<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Monmodele extends Model
{   
    //Fonction de connexion
    /**
     * Fonction de connexion
     * @param string $login
     * @param string $mdp
     * 
     * @return 0 ou 1
     */
    public function Connexion($login, $mdp) {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->selectCount('idUser');
        $builder->where('loginUser', $login);
        $builder->where('mdpUser', $mdp);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->idUser;
    }

    //Fonction d'inscrption qui va insert
    /**
     * Fonction d'inscription
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param string $motdePasse
     * @param string $adresse
     * @param string $login
     * @param string $codeParrainage
     */
    public function Inscription($nom, $prenom, $email, $motdePasse, $adresse, $login, $codeParrainage) {
        $db = \Config\Database::connect();


        /*$sql = "INSERT INTO utilisateur (nomUser, prenomUser, roleUser, emailUser, adresseUser, mdpUser, loginUser, codeParrainage)
                VALUES (:nom, :prenom, 'arrivant', :email, :adresse, :motdePasse, :login, :codeParrainage)
        ";*/

        $builder = $db->table('utilisateur');

        //Payload qu'on va inseret dans la bdd
        $data = [
            'nomUser' => $nom,
            'prenomUser' => $prenom,
            'emailUser' => $email,
            'adresseUser' => $adresse,
            'mdpUser' => $motdePasse,
            'loginUser' => $login,
            'roleUser' => 'arrivant',
            'codeParrainage' => $codeParrainage
        ];

        //Insert le payload dans la bdd
        $builder->insert($data);

    }

    /**
     * Fonction qui permet de savoir si l'utilisateur existe déjà grace au mail ou login
     * @param string $email
     * @param string $login
     * 
     * @return int idUser qui est l'id de l'utilisateur
     */
    public function utilisateurExistant($email, $login) {
        $db = \Config\Database::connect();

        $builder = $db->table('utilisateur');

        $builder->selectCount('idUser');

        //Si l'email correspond a l'email ou au login, alors renvoyer 1
        $builder->groupStart()
            ->where('emailUser', $email)
            ->orWhere('loginUser', $login)
        ->groupEnd();

        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->idUser;
    }

    /**
     * Fonction qui permet de obtenir le rôle de l'utilisateur arrivant, maire, secretaire
     * @param mixed $login
     * 
     * @return string le role de l'utilisateur
     */
    public function getRole($login) {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->select('roleUser');
        $builder->where('loginUser', $login);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->roleUser;
    }

    /**
     * Retourne le nb de evenements existant
     * @return int un entier qui correspond au nb de evenement
     */
    public function nbEvenements() {
        $db = \Config\Database::connect();
        $builder = $db->table('evenements');
        //On compte le nombre de évenements existant
        $builder->selectCount('idGestion');
        $query = $builder->get();
        $result = $query->getResult();
        //retourne un int
        return $result[0]->idGestion;
    }

    /**
     * Fonction qui va permettre de récupérer tout les évenements et de les mettres dans une ArrayList
     * 
     * @return array un tableau 
     */
    public function recupererEvenements() {
        $db = \Config\Database::connect();
        $builder = $db->table('evenements');
        $builder->select('idGestion, nomEvenement, dateEvenement, descriptionEvenement, nbplaceDispo, dureeEvenement, nbplaceMax, statutEvenement');
        $query = $builder->get();
        //return le résultat sous forme de tableau
        return $query->getResultArray();
    }

    /**
     * Faire passer en para le id de l'évenements et récup tous les participants
     * 
     * @param mixed $idEvenement
     * 
     * @return array un tableau ou dedans y'a la liste des participant d'un evenement précis
     */
    public function listedesparticipantEvenements($idEvenement) {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        
        $builder->join('resaevenements', 'utilisateur.idUser = resaevenements.idUser');
        
        $builder->select('nomUser, prenomUser, emailUser, adresseUser, dateReservation, nbplaceTotale, statutReservation');
        $builder->where('idGestion', $idEvenement);
        $query = $builder->get();
        
        // Retourner le résultat sous forme de tableau
        return $query->getResultArray();
    }

    /**
     * Fonction qui permet de connaitre l'evenement populaire
     * 
     * @return array un tableau des evenement les plus populaire
     */
    public function evenementsPopulaire() {
        $db = \Config\Database::connect();

        $builder = $db->table('evenements');

        $builder->join('resaevenements', 'evenements.idGestion = resaevenements.idGestion');

        $builder->select('nomEvenement, dateEvenement, COUNT(idResa) AS nb_reservations, SUM(nbplaceTotale) AS nb_places_reservees, statutEvenement');

        $builder->where('statutReservation', 'valider');
        $builder->groupBy('evenements.idGestion');
        $builder->orderBy('nb_places_reservees', 'DESC');

        $query = $builder->get();
        return $query->getResultArray();

    }

    /**
     * Fonction qui retourn un tableau des types d'evenement existant
     * 
     * @return array un tableau
     */
    public function gettypeEvenement() {
        $db = \Config\Database::connect();
        $builder = $db->table('typeevenement');
        $builder->select('nom');
        $query = $builder->get();
    
        $result = $query->getResultArray();
    
        $lestypeEvenements = []; // Tableau indexé avec seulement les noms
        foreach ($result as $Event) {
            $lestypeEvenements[] = $Event['nom']; // Ajouter seulement le nom
        }
    
        return $lestypeEvenements;
    }
    
    

    /**
     * Fonction qui permet d'ajouter un evenement
     * 
     * @param string $nom
     * @param string $date
     * @param string $descriptionEvent
     * @param int $nbPlace
     * @param string $duree
     * @param string $idtypeEvenement
     */
    public function ajouterEvenement($nom, $date, $descriptionEvent, $nbPlace, $duree, $idtypeEvenement) {
        $db = \Config\Database::connect();

        //$sql = "INSERT INTO evenements (nomEvenement, dateEvenement, descriptionEvenement, nbplaceDispo, dureeEvenement, idtypeEvenement, nbplaceMax) VALUES (:nom, :date, :descriptionEvent, :nbPlace, :duree, :idtypeEvenement, :nbplaceMax)";

        $builder = $db->table('evenements');

        //Payload qu'on va inseret dans la bdd
        $data = [
            'nomEvenement' => $nom,
            'dateEvenement' => $date,
            'descriptionEvenement' => $descriptionEvent,
            'nbplaceDispo' => $nbPlace,
            'nbplaceMax' => $nbPlace,
            'dureeEvenement' => $duree,
            'idtypeEvenement' => $idtypeEvenement,
            'statutEvenement' => 'actif',
        ];

        //Insert le payload dans la bdd
        $builder->insert($data);
    }
    

    public function getidTypeEvenement($event) {
        $db = \Config\Database::connect();

        $builder = $db->table('evenements');
        $builder->select('idtypeEvenement');
        $builder->where('idtypeEvenement', $login);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->roleUser;
    }
    
  

    public function addReservation($idUser, $idGestion, $nomReservation, $dateReservation, $dateEvenement, $typeReservation, $nbplaceTotale)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');

        $data = [
            'idUser'           => $idUser,
            'idGestion'        => $idGestion,
            'nomReservation'   => $nomReservation,
            'dateReservation'  => $dateReservation,  
            'dateEvenement'    => $dateEvenement,    
            'typeReservation'  => $typeReservation,
            'nbplaceTotale'    => $nbplaceTotale,
            'statutReservation'=> 'En attente'
        ];

        return $builder->insert($data);
    }


    //  Récupérer toutes les réservations
    public function getAllReservations() {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->select('*')->get()->getResultArray();
    }

    public function suppressionEvenement($idEvenement) {
        $db = \Config\Database::connect();

        // Préparer la requête de suppression
        $builder = $db->table('evenements');
        $builder->where('idGestion', $idEvenement);

        $builder->delete();
    }

    /**
     * Permet de vérifier si un utilisateur est un ancien habitant qui peux parrainer un nouveau arrivant
     * 
     * @return [type]
     */
    public function verificationAncienneter($codeParrainage) {
        $db = \Config\Database::connect();

        $builder = $db->table('utilisateur');

        $builder->select('roleUser');

        $builder->where('codeParrainage', $codeParrainage);

        $query = $builder->get();

        // Retourne un objet ou null
        $result = $query->getRow();

        //Si il n'a aucun résultat retourne null
        return $result ? $result->roleUser : null;
    }



    /**
     * Permet de parrainer un Utilisateur
     * 
     */
    public function parrainageUtilisateur() {
        $db = \Config\Database::connect();
    
        $sql = "INSERT INTO parrainage (dateParrainage) VALUES (NOW())";
    
        $db->query($sql);
    }
    


    /**Fonction qui permet de trouver qui est l'utilisateur d'un code de parrainage
     * 
     * @return int idUser
     */
    public function ProprietaireCode($codeParrainage) {
        $db = \Config\Database::connect();

        $builder = $db->table('utilisateur');

        $builder->select('idUser');

        $builder->where('codeParrainage', $codeParrainage);

        $query = $builder->get();

        $result = $query->getResult();

        return $result[0]->idUser;

    }


    public function insertParrainage($idUser) {
        $db = \Config\Database::connect();

        $builder = $db->table('parrainage_effectuer');

        $data = [
            'idUser' => $idUser,
        ];

        //Insert le payload dans la bdd
        $builder->insert($data);
    }

    public function recupererunEvenement($idEvenement) {
        $db = \Config\Database::connect();

        $builder = $db->table('evenements');

        $builder->join('typeevenement', 'evenements.idtypeEvenement = typeevenement.idtypeEvenement');

        $builder->select('nomEvenement, typeevenement.nom, dateEvenement, descriptionEvenement, nbplaceMax, dureeEvenement');

        $builder->where('idGestion', $idEvenement);

        $query = $builder->get();
        //return le résultat sous forme de tableau
        return $query->getRowArray(); 
    }



    public function updatePlacesDispo($idEvenement, $nbDispo)
{
    $db = \Config\Database::connect();
    $builder = $db->table('evenements');
    $builder->where('idGestion', $idEvenement);
    return $builder->update(['nbplaceDispo' => $nbDispo]);
}


    /**
     * Permet de récupérer le nombre de place dispo d'un event
     * 
     * @param mixed $idEvent
     * 
     * @return int
     */
    public function getnbPlaceDispo($idEvent) {
        $db = \Config\Database::connect();

        $builder = $db->table('evenements');

        $builder->select('nbplaceDispo');

        $builder->where('idGestion', $idEvent);

        $query = $builder->get();

        $result = $query->getResult();

        return $result[0]->nbplaceDispo;
    }


    public function updateunEvenement($idEvenement, $nom, $typeEvenement, $dateEvenement, $descriptionEvenement, $nbplaceMax, $dureeEvenement) {
        $db = \Config\Database::connect();

        // Récupérer le nombre actuel de places disponibles
        $nbPlaceDispoActuel = $this->getnbPlaceDispo($idEvenement);

        // Récupérer le nombre actuel de places maximum
        $query = $db->table('evenements')->select('nbplaceMax')->where('idGestion', $idEvenement)->get();
        $row = $query->getRow();

        if ($row) {
            $ancienNbPlaceMax = $row->nbplaceMax;
    
            // Ajuster le nombre de places disponibles
            $nouveauNbPlaceDispo = $nbPlaceDispoActuel + ($nbplaceMax - $ancienNbPlaceMax);
    
            // Assurer que le nombre de places disponibles ne dépasse pas le max
            if ($nouveauNbPlaceDispo > $nbplaceMax) {
                $nouveauNbPlaceDispo = $nbplaceMax;
            } elseif ($nouveauNbPlaceDispo < 0) {
                $nouveauNbPlaceDispo = 0; // Éviter les valeurs négatives
            }
        } 

        // Récupérer les données de la requête (exemple avec les données venant d'un formulaire)
        $data = [
            'nomEvenement' => $nom,
            'idtypeEvenement' => $typeEvenement,
            'dateEvenement' => $dateEvenement,
            'descriptionEvenement' => $descriptionEvenement,
            'nbplaceMax' => $nbplaceMax,
            'nbplaceDispo' => $nouveauNbPlaceDispo, // Mettre à jour le nombre de places disponibles
            'dureeEvenement' => $dureeEvenement
        ];

        $builder = $db->table('evenements');  // Nom de la table à mettre à jour
        
        $builder->where('idGestion', $idEvenement);
        $builder->update($data);
    }


    /**
     * Récupère un utilisateur par son idUser (pour affichage du profil).
     *
     * @param int $idUser
     * @return array|null
     */
    public function getUserById($idUser)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->where('idUser', $idUser);
        $query = $builder->get();

        // getRowArray() => tableau associatif ou null
        return $query->getRowArray();
    }

    /**
 * Récupère un utilisateur par son login (pour affichage du profil).
 *
 * @param string $login
 * @return array|null
 */
public function getUserByLogin($login)
{
    $db = \Config\Database::connect();
    $builder = $db->table('utilisateur');
    $builder->where('loginUser', $login);
    $query = $builder->get();
    return $query->getRowArray();
}


    /**
     * Met à jour les informations d’un utilisateur.
     *
     * @param int   $idUser
     * @param array $data
     * @return bool
     */
    public function updateUser($idUser, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->where('idUser', $idUser);
        return $builder->update($data);
    }

    // ------------------------------------------------------------------
    // 3) Gestion des réservations
    // ------------------------------------------------------------------

    /**
     * Récupère les réservations d’un utilisateur.
     *
     * @param int $idUser
     * @return array
     */
    public function getReservationsByUser($idUser)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->where('idUser', $idUser)->get()->getResultArray();
    }

    /**
     * Récupère une réservation précise par son idResa.
     *
     * @param int $idResa
     * @return object|null
     */
    public function getReservation($idResa)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        $builder->where('idResa', $idResa);
        $query = $builder->get();
        return $query->getRow(); // objet ou null
    }

    /**
     * Supprime (annule) une réservation.
     *
     * @param int $idResa
     * @return bool
     */
    public function deleteReservation($idResa)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->delete(['idResa' => $idResa]);
    }

    
    //Ajouter un log
    public function addLog($idUser, $action, $details = null) {
        return $this->insert([
            'idUser'  => $idUser,
            'action'  => $action,
            'details' => $details
        ]);
    }
    
}



