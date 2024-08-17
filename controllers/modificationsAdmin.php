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

/*
        $text_actualite_1 = sanitize($_POST["texte_article_1"]);
        $text_actualite_2 = sanitize($_POST["texte_article_2"]);
        $text_actualite_3 = sanitize($_POST["texte_article_3"]);
        $text_actualite_4 = sanitize($_POST["texte_article_4"]);
        $text_actualite_5 = sanitize($_POST["texte_article_5"]);
        $text_actualite_6 = sanitize($_POST["texte_article_6"]);
        $text_actualite_7 = sanitize($_POST["texte_article_7"]);
        $text_actualite_8 = sanitize($_POST["texte_article_8"]);
        $text_actualite_9 = sanitize($_POST["texte_article_9"]);
        $text_actualite_10 = sanitize($_POST["texte_article_10"]);
        //
        $date_actualite_1 = sanitize($_POST["date_article_1"]);
        $date_actualite_2 = sanitize($_POST["date_article_2"]);
        $date_actualite_3 = sanitize($_POST["date_article_3"]);
        $date_actualite_4 = sanitize($_POST["date_article_4"]);
        $date_actualite_5 = sanitize($_POST["date_article_5"]);
        $date_actualite_6 = sanitize($_POST["date_article_6"]);
        $date_actualite_7 = sanitize($_POST["date_article_7"]);
        $date_actualite_8 = sanitize($_POST["date_article_8"]);
        $date_actualite_9 = sanitize($_POST["date_article_9"]);
        $date_actualite_10 = sanitize($_POST["date_article_10"]);
        //
        $visibilite_actualite_1 = sanitize($_POST["visibilite_article_1"]);
        $visibilite_actualite_2 = sanitize($_POST["visibilite_article_2"]);
        $visibilite_actualite_3 = sanitize($_POST["visibilite_article_3"]);
        $visibilite_actualite_4 = sanitize($_POST["visibilite_article_4"]);
        $visibilite_actualite_5 = sanitize($_POST["visibilite_article_5"]);
        $visibilite_actualite_6 = sanitize($_POST["visibilite_article_6"]);
        $visibilite_actualite_7 = sanitize($_POST["visibilite_article_7"]);
        $visibilite_actualite_8 = sanitize($_POST["visibilite_article_8"]);
        $visibilite_actualite_9 = sanitize($_POST["visibilite_article_9"]);
        $visibilite_actualite_10 = sanitize($_POST["visibilite_article_10"]);
*/


    // Nettoyer les données + Rangement dans un tableau
    $tab_updated_data = [
        'actualite_1' => [1,sanitize($_POST["texte_article_1"]),sanitize($_POST["date_article_1"]),sanitize(isset($_POST["visibilite_article_1"]))],
        'actualite_2' => [2,sanitize($_POST["texte_article_2"]),sanitize($_POST["date_article_2"]),sanitize(isset($_POST["visibilite_article_2"]))],
        'actualite_3' => [3,sanitize($_POST["texte_article_3"]),sanitize($_POST["date_article_3"]),sanitize(isset($_POST["visibilite_article_3"]))],
        'actualite_4' => [4,sanitize($_POST["texte_article_4"]),sanitize($_POST["date_article_4"]),sanitize(isset($_POST["visibilite_article_4"]))],
        'actualite_5' => [5,sanitize($_POST["texte_article_5"]),sanitize($_POST["date_article_5"]),sanitize(isset($_POST["visibilite_article_5"]))],
        'actualite_6' => [6,sanitize($_POST["texte_article_6"]),sanitize($_POST["date_article_6"]),sanitize(isset($_POST["visibilite_article_6"]))],
        'actualite_7' => [7,sanitize($_POST["texte_article_7"]),sanitize($_POST["date_article_7"]),sanitize(isset($_POST["visibilite_article_7"]))],
        'actualite_8' => [8,sanitize($_POST["texte_article_8"]),sanitize($_POST["date_article_8"]),sanitize(isset($_POST["visibilite_article_8"]))],
        'actualite_9' => [9,sanitize($_POST["texte_article_9"]),sanitize($_POST["date_article_9"]),sanitize(isset($_POST["visibilite_article_9"]))],
        'actualite_10' => [10,sanitize($_POST["texte_article_10"]),sanitize($_POST["date_article_10"]),sanitize(isset($_POST["visibilite_article_10"]))]
    ];

    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Mise à jour des actualités en BDD
    $data = updateTopics($bdd,$tab_updated_data);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Envoi d'un message si fonctionnement correct
    return "Les données ont bien été enregistrées.";
}






echo renderHeader($_ENV['liens_css']['modifications_admin']);
echo renderModificationsAdmin(getActualites(),updateActualites());
echo renderFooter();

?>