<?php

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