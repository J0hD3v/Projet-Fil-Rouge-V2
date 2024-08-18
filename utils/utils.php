<?php
// Fonction pour se connecter à la BDD
function connect($host,$dbname,$login,$password){
return new PDO('mysql:host='.$host.';dbname='.$dbname.'',$login,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}


// Fonction pour nettoyer les données reçues
function sanitize($data){
return htmlentities(strip_tags(stripcslashes(trim($data))));
}


// Fonction de récupération de l'ensemble des actualités
function getActualites(){
    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Récupération de toutes les actualités enregistrées en BDD
    $data = getAllTopics($bdd);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Envoi des données si fonctionnement correct
    return $data;
}