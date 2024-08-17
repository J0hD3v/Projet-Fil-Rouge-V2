<?php

// Activation de la session
session_start();

// Importation des ressources communes
// variables d'environnement
include './env.php';
// fonctions utilitaires
include './utils/utils.php';
// models
include './models/modelUtilisateurs.php';
include './models/modelActualites.php';
// views
include './views/viewHeader.php';
include './views/viewFooter.php';
// components
/* include './components/viewNavbar.php'; */

// Récupération des informations de la requête (l'URL) et Isoler le path (la partie après le nom de dommaine dans l'url)
$url = parse_url($_SERVER['REQUEST_URI']);

// Test de l'url pour connaitre la route, ou retourner la racine
$path = isset($url['path']) ? $url['path'] : '/';




// Rooter

switch($path){
    // route pour l'accueil -> controller accueil.php
    case '/' :
        // view
        include './views/viewAccueil.php';
        // controller
        include './controllers/accueil.php';
        break;

    //route pour la connexion -> controller seconnecter.php
    case '/galerie' :
        // views
        include './views/viewGalerie.php';
        // controller
        include './controllers/galerie.php';
        break;

    //route pour la création de compte -> controller creationCompte.php
    case '/creation-compte' :
        // view
        include './views/viewCreationCompte.php';
        // controller
        include './controllers/creationCompte.php';
        break;

    //route pour la connexion -> controller connexion.php
    case '/connexion' :
        // view
        include './views/viewConnexion.php';
        // controller
        include './controllers/connexion.php';
        break;

    //route pour les informations utilisateur -> controller informationsUtilisateur.php
    case '/informations-utilisateur' :
        // view
        include './views/viewInformationsUtilisateur.php';
        // controller
        include './controllers/informationsUtilisateur.php';
        break;

    //route pour la deconnexion -> controller deconnexion.php
    case '/deconnexion' :
        // controller
        include './controllers/deconnexion.php';
        break;

    //route pour la page de modifications administrateur -> controller modificationsAdmin.php
    case '/modifications-admin' :
        // view
        include './views/viewModificationsAdmin.php';
        // controller
        include './controllers/modificationsAdmin.php';
        break;

    //route par défaut : page 404 -> controller 404.php
    default:
        // view
        include './views/view404.php';
        // controller
        include './controllers/404.php';
        break;
    
}

?>