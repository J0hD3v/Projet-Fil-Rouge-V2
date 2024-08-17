<?php

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





// Fonction de modification des articles d'actualité
function updateActualites(){
    // Vérifier l'envoi du formulaire
    if(!isset($_POST["submit"])){
        return;
    }

    // Vérifier les champs vides
    // pas nécessaire

    // Vérifier le format des données
    // pas nécessaire

    // Nettoyer les données
    $name = sanitize($_POST["texte_article_"]);
    $name = sanitize($_POST["date_article_"]);
    $name = sanitize($_POST["visibilite_article_"]);

    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Récupération de toutes les actualités enregistrées en BDD
    $data = updateTopics($bdd);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Envoi des données si fonctionnement correct
    return $data;
}






echo renderHeader($_ENV['liens_css']['modifications_admin']);
echo renderModificationsAdmin(getActualites());
echo renderFooter();

?>