<?php 

    namespace Config;

    //Fonction qui génére le code de parainage
    public function generateCode() {
        $premierCara = 'GC';
        $aleatoire = sprintf('%06d', mt_rand(0, 999999));
        return $premierCara . $aleatoire;
    }
?>