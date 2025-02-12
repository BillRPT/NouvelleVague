<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Monmodele extends Model
{   
    //Fonction de connexion
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
    public function Inscription($nom, $prenom, $email, $motdePasse, $adresse, $login, $codeParrainage) {
        $db = \Config\Database::connect();


        $sql = "INSERT INTO utilisateur (nomUser, prenomUser, roleUser, emailUser, adresseUser, mdpUser, loginUser, codeParrainage)
                VALUES (:nom, :prenom, 'arrivant', :email, :adresse, :motdePasse, :login, :codeParrainage)
        ";

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

    public function getRole($login) {
        $db = \Config\Database::connect();
        $builder = $db->table('utilisateur');
        $builder->select('roleUser');
        $builder->where('loginUser', $login);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->roleUser;
    }

    //Retourne le nb de evenements existant
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

    //Fonction qui va permettre de récupérer tout les évenements et de les mettres dans une ArrayList
    public function recupererEvenements() {
        $db = \Config\Database::connect();
        $builder = $db->table('evenements');
        $builder->select('idGestion, nomEvenement, dateEvenement, description, nbplaceDispo, dureeEvenement, nbplaceMax, statutEvenement');
        $query = $builder->get();
        //return le résultat sous forme de tableau
        return $query->getResultArray();
    }

    //Faire passer en para le id de l'évenements et récup tous les participants
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
    
    

    public function ajouterEvenement($nom, $date, $description, $nbPlace, $duree, $idtypeEvenement) {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO evenements (nomEvenement, dateEvenement, description, nbplaceDispo, dureeEvenement, idtypeEvenement, nbplaceMax) VALUES (:nom, :date, :description, :nbPlace, :duree, :idtypeEvenement, :nbplaceMax)";

        $builder = $db->table('evenements');

        //Payload qu'on va inseret dans la bdd
        $data = [
            'nomEvenement' => $nom,
            'dateEvenement' => $date,
            'description' => $description,
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
    


}