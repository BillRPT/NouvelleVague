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
        $builder->where('emailUser', $login);
        $builder->where('mdpUser', $mdp);
        $query = $builder->get();
        $result = $query->getResult();
        return $result[0]->idUser;
    }
}