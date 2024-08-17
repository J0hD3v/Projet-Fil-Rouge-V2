<?php

function affichageInfosCompte() {
    // si l'utilisateur est connecté
    if(isset($_SESSION["is_connected"]) && ($_SESSION["is_connected"] == true)) {

        if($_SESSION["is_admin"] == true) {
            $status = "Administrateur";
        } else {
            $status = "Client";
        }

        $tab_infosUtilisateur = [
            "name" => $_SESSION["name_user"],
            "first_name" => $_SESSION["first_name_user"],
            "email" => $_SESSION["email_user"],
            "phone" => $_SESSION["phone_user"],
            "dob" => $_SESSION["dob_user"],
            "status" => $status
        ];

    } else {
        // si l'utilisateur n'est pas connecté
        $tab_infosUtilisateur = [
            "name" => "",
            "first_name" => "",
            "email" => "",
            "phone" => "",
            "dob" => "",
            "status" => ""
        ];
    }
    return $tab_infosUtilisateur;
}


function modifierInformations() {

    // Vérifier l'envoi du formulaire
    if(!isset($_POST["submit"])){
        return;
    }

    // si l'utilisateur n'est pas connecté -> erreur
    if(!isset($_SESSION["is_connected"])) {
        return "Vous n'êtes pas connecté";
    }

    // Vérifier les champs vides
    if(!isset($_POST["name_user"]) || empty($_POST["name_user"]) ||
    !isset($_POST["firstname_user"]) || empty($_POST["firstname_user"]) ||
    !isset($_POST["email_user"]) || empty($_POST["email_user"]) ||
    !isset($_POST["phone_user"]) || empty($_POST["phone_user"]) ||
    !isset($_POST["dob_user"]) || empty($_POST["dob_user"]) ||
    !isset($_POST["password_user"]) || empty($_POST["password_user"])){
        return "Veuillez remplir tous les champs.";
    }

    // Vérifier le format des données
    if(!filter_var($_POST["email_user"],FILTER_VALIDATE_EMAIL)){
        return "Votre email n'est pas au bon format";
    }
    if(!strlen($_POST["phone_user"]) == 10 && ctype_digit($_POST["phone_user"])){
        return "Votre numéro de téléphone n'est pas au bon format.";
    }


    // Nettoyer les données
    $name = sanitize($_POST["name_user"]);
    $firstname = sanitize($_POST["firstname_user"]);
    $email = sanitize($_POST["email_user"]);
    $phone = sanitize($_POST["phone_user"]);
    $dob = sanitize($_POST["dob_user"]);
    $password = sanitize($_POST["password_user"]);

    // Hasher le mot de passe
    $password = password_hash($password,PASSWORD_BCRYPT);

    // Connexion à la BDD
    $bdd = connect($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dbLogin'],$_ENV['dbPassword']);

    // Vérification des champs uniques
    $data = readUserByEmail($bdd,$email);
    if(!empty($data) && ($email != $_SESSION["email_user"])){
        return "Cet email est déjà utilisé.";
    }

    // Modification des données de l'utilisateur
    $data = updateUser($bdd,$_SESSION["id_user"],$name,$firstname,$email,$phone,$dob,$password);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Modification effectuée, récupération des données
    $data = readUserByEmail($bdd,$email);

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

    // Affichage d'un message de confirmation
    echo '<script>window.location.href = "/informations-utilisateur";</script>';
    return;
}






echo renderHeader($_ENV['liens_css']['informationsUtilisateur']);
echo renderInformationsUtilisateur(affichageInfosCompte(),modifierInformations());
echo renderFooter();


?>