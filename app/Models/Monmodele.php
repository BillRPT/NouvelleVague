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

    public function inscription($nom, $prenom, $email, $motdePasse) {
        $db = \Config\Database::connect();

        //Régles a respecter
        $rules = [
            'username' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[10]',
            'email' => 'required|max_length[254]|valid_email',
        ];

        

    }
}