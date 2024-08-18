<?php

// Function getActualites() définie dans utils.php


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

    // Redirection à la page d'accueil
    echo '<script>window.location.href = "/modifications-admin";</script>';
    return;
}






echo renderHeader($_ENV['liens_css']['modifications_admin']);
echo renderModificationsAdmin(getActualites(),updateActualites());
echo renderFooter();

?>