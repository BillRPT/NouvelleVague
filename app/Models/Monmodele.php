<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Monmodele extends Model
{
    public function getLesContacts()
    {
        /*$db = \Config\Database::connect();
        $sql = "SELECT * FROM user";
        $results = $db->query($sql);
        $db->close();
        return $results->getResultArray();*/

        $db = \Config\Database::connect();
        //Accèder a la table user
        $builder = $db->table('user');
        $query = $builder->get();
        //getResultArray  pour obtenir le resultat sous forme de tableau
        return $query->getResultArray();

    }

    public function getnbContacts() {
        $db = \Config\Database::connect();
        /*$sql = "SELECT COUNT(*) AS nb FROM user";
        $query = $db->query($sql);
        $results = $query->getRowArray();
        $db->close();
        return $results['nb'];*/
        $builder = $db->table('user');
        $builder->selectCount('id');
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->id;
    }

    public function Connexion($login, $mdp) {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->selectCount('id');
        $builder->where('email', $login);
        $builder->where('mdp', $mdp);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->id;


    }

    public function ajouterunContact($user, $email, $password) {
        //Voir https://codeigniter.com/user_guide/database/query_builder.html#inserting-data && https://codeigniter4.github.io/CodeIgniter4/database/query_builder.html
        $db = \Config\Database::connect();
        $sql = "INSERT INTO user (login_user, email, mdp) VALUES (:user, :email, :mdp)";
        //Accèder a la table user
        $builder = $db->table('user');
        $data = [
            'login_user' => $user,
            'email' => $email,
            'mdp' => $password
        ];
        $builder->insert($data);
    }
}