<?php

// Reçoit des données, enregistre un nouvel utilisateur en BDD
/* function addUser($bdd,$name,$firstname,$email,$phone,$dob,$password){
    try{
        //Préparer la requête d'enregistrement
        $req=$bdd->prepare('INSERT INTO utilisateurs (email,mdp,nom,prenom,telephone,date_naissance,id_role_utilisateur) VALUES (?,?,?,?,?,?,1)');

        //Binding de Param
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->bindParam(2,$password,PDO::PARAM_STR);
        $req->bindParam(3,$name,PDO::PARAM_STR);
        $req->bindParam(4,$firstname,PDO::PARAM_STR);
        $req->bindParam(5,$phone,PDO::PARAM_STR);
        $req->bindParam(6,$dob,PDO::PARAM_STR);

        //Executer la requête     
        if($req->execute()){
            return true;
        }
    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
} */


// Retourne toutes les infos de toutes les actualites
function getAllTopics($bdd){
    try{
        $req=$bdd->prepare('SELECT id_actualite,texte,est_affiche,date_horaire FROM actualites');

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}


// Reçoit un Email, retourne le mot de passe de l'utilisateur
/* function readPasswordByEmail($bdd,$email){
    try{
        $req=$bdd->prepare('SELECT mdp FROM utilisateurs WHERE email = ?');

        $req->bindParam(1,$email,PDO::PARAM_STR);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
} */


// Reçoit des données et un id, met à jour les données de l'utilisateur
function updateTopics($bdd,$tab_updated_data){

    foreach($tab_updated_data as $updated_topic){
/* if($updated_topic[0]==2){return $updated_topic[1];} */
        try{
            //Préparer la requête d'enregistrement
            $req=$bdd->prepare('UPDATE actualites SET texte=?, date_horaire=?, est_affiche=? WHERE id_actualite = ?');
            
            //Binding de Param
            $req->bindParam(1,$updated_topic[1],PDO::PARAM_STR);
            $req->bindParam(2,$updated_topic[2],PDO::PARAM_STR);
            $req->bindParam(3,$updated_topic[3],PDO::PARAM_BOOL);
            $req->bindParam(4,$updated_topic[0],PDO::PARAM_INT);
    
            //Executer la requête (stop la requête si il y a une erreur)
            /* $req->execute(); */
            if(!($req->execute())){
                return false;
            }
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }

    }
    return true;
}