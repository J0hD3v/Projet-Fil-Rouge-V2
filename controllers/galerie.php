<?php

// Fonction de récupération de l'ensemble des médias
function getMedias(){
    
    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Récupération de tous les médias enregistrés en BDD
    $data = getAllMedias($bdd);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Envoi des données si fonctionnement correct
    return $data;
}









echo renderHeader($_ENV['liens_css']['galerie'],$_ENV['liens_js']['galerie']);
echo renderGalerie(getMedias());
echo renderFooter();

?>