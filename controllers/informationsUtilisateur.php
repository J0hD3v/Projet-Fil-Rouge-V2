<?php

function affichageInfosCompte() {
    // si l'utilisateur est connecté
    if($_SESSION["is_connected"] == true) {

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





echo renderHeader($_ENV['liens_css']['informationsUtilisateur']);
echo renderInformationsUtilisateur(affichageInfosCompte());
echo renderFooter();


?>