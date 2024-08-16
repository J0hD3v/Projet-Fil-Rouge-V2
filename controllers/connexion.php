<?php


// CONNEXION

function connexion() {
    // Vérifier l'envoi du formulaire
    if(!isset($_POST["submit"])){
        return;
    }

    // Vérifier les champs vides
    if(!isset($_POST["email_connecting_user"]) || empty($_POST["email_connecting_user"]) ||
    !isset($_POST["password_connecting_user"]) || empty($_POST["password_connecting_user"])){
        return "Veuillez remplir tous les champs.";
    }

    // Vérifier le format des données
    if(!filter_var($_POST["email_connecting_user"],FILTER_VALIDATE_EMAIL)){
        return "Votre email n'est pas au bon format";
    }

    // Nettoyer les données
    $connecting_email = sanitize($_POST["email_connecting_user"]);
    $connecting_password = sanitize($_POST["password_connecting_user"]);

    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Vérification de l'existence de l'email
    $data = readUserByEmail($bdd,$connecting_email);
    if(empty($data)){
        return "Email et/ou Mot de passe incorrect.";
    }

    // Récupération du mot de passe correspondant à l'email
    $hash = readPasswordByEmail($bdd,$connecting_email);
    if(!password_verify($connecting_password,$hash[0]["mdp"])){
        return "Email et/ou Mot de passe incorrect.";
    }

    // Si connexion effectuée, récupération des données
    $data = readUserByEmail($bdd,$connecting_email);

    // Connexion + Message en cas de bon fonctionnement
    $_SESSION["is_connected"] = true;
    $_SESSION["id_user"] = $data[0]["id_utilisateur"];
    $_SESSION["name_user"] = $data[0]["nom"];
    $_SESSION["first_name_user"] = $data[0]["prenom"];
    $_SESSION["email_user"] = $data[0]["email"];
    $_SESSION["phone_user"] = $data[0]["telephone"];
    $_SESSION["dob_user"] = $data[0]["date_naissance"];
    if($data[0]["id_role_utilisateur"] == 2){
        $_SESSION["is_admin"] = true;
    } else {
        $_SESSION["is_admin"] = false;
    }

    // Redirection à la page d'accueil
    echo '<script>window.location.href = "/";</script>';
    return;
}






echo renderHeader($_ENV['liens_css']['connexion']);
echo renderConnexion(connexion());
echo renderFooter();