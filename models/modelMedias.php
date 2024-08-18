<?php

// Reçoit des données, enregistre un nouvel utilisateur en BDD
function addMedia($bdd,$lien,$nom,$date_horaire,$description,$id_type,$id_utilisateur){
    try{
        $req=$bdd->prepare('INSERT INTO medias (lien,nom,date_horaire,description_media,id_type_media,id_utilisateur) VALUES (?,?,?,?,?,?)');

        //Binding de Param
        $req->bindParam(1,$lien,PDO::PARAM_STR);
        $req->bindParam(2,$nom,PDO::PARAM_STR);
        $req->bindParam(3,$date_horaire,PDO::PARAM_STR);
        $req->bindParam(4,$description,PDO::PARAM_STR);
        $req->bindParam(5,$id_type,PDO::PARAM_INT);
        $req->bindParam(6,$id_utilisateur,PDO::PARAM_INT);

        //Executer la requête     
        if($req->execute()){
            return true;
        }

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}




// Retourne toutes les infos de toutes les Medias
function getAllMedias($bdd){
    try{
        $req=$bdd->prepare('SELECT id_media,lien,nom,date_horaire,description_media,id_type_media,id_utilisateur FROM medias');

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}









// Reçoit un id_utilisateur, et retourne toutes les infos des Medias avec cet id
function getMediasByUser($bdd,$id_user){

}