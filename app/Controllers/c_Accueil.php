<?php
namespace App\Controllers;

class Accueil extends BaseController
{
    public function index()
    {
        return view('v_Accueil'); // ou ce que vous voulez
    }
}
