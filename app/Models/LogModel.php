<?php
namespace App\Models;
use CodeIgniter\Model;

class LogModel extends Model {
    protected $table = 'log';
    protected $primaryKey = 'idLog';
    protected $allowedFields = ['idUser', 'action', 'details', 'dateLog'];

    //Ajouter un log
    public function addLog($idUser, $action, $details = null) {
        return $this->insert([
            'idUser'  => $idUser,
            'action'  => $action,
            'details' => $details
        ]);
    }
}
