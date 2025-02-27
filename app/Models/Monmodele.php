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
        $builder->where('idResa', $idEvenement);
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
    
  
    //  Réservations  Ajouter une réservation
    public function addReservation($idUser, $idGestion, $nomReservation, $dateReservation, $typeReservation, $nbplaceTotale) {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');

        $data = [
            'idUser' => $idUser,
            'idGestion' => $idGestion,
            'nomReservation' => $nomReservation,
            'dateReservation' => $dateReservation,
            'typeReservation' => $typeReservation,
            'nbplaceTotale' => $nbplaceTotale,
            'statutReservation' => 'En attente'
        ];

        return $builder->insert($data);
    }

    //  Récupérer toutes les réservations
    public function getAllReservations() {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->select('*')->get()->getResultArray();
    }

    //  Récupérer les réservations par utilisateur
    public function getReservationsByUser($idUser) {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->where('idUser', $idUser)->get()->getResultArray();
    }

    //  Supprimer une réservation
    public function deleteReservation($idResa) {
        $db = \Config\Database::connect();
        $builder = $db->table('resaevenements');
        return $builder->delete(['idResa' => $idResa]);
    }

    public function getUserById($idUser) {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->where('idUser', $idUser);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function suppressionEvenement($idEvenement) {
        $db = \Config\Database::connect();

        // Préparer la requête de suppression
        $builder = $db->table('evenements');
        $builder->where('idGestion', $idEvenement);

        $builder->delete();
    }

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

    public function parrainageUtilisateur() {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO parrainage (dateParrainage) VALUES (NOW()))";

        $db->query($sql);
    }
    
    
}



