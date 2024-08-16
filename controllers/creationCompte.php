<?php


// ENVOIE DU FORMULAIRE D'INSCRIPTION

function createAccount() {
    // Vérifier l'envoi du formulaire
    if(!isset($_POST["submit"])){
        return;
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
    if(!empty($data)){
        return "Cet email est déjà utilisé.";
    }

    // Enregistrement du nouvel utilisateur
    $data = addUser($bdd,$name,$firstname,$email,$phone,$dob,$password);
    if($data != true){
        return "Une Erreur est survenue, veuillez réessayer.";
    }

    // Connexion effectuée, récupération des données
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

    // Redirection à la page d'accueil
    echo '<script>window.location.href = "/";</script>';
    return;
}








echo renderHeader($_ENV['liens_css']['connexion']);
echo renderCreationCompte(createAccount());
echo renderFooter();

?>