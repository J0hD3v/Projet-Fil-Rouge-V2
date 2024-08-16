<?php

function readUserByEmail($bdd,$email){
    try{
        //7) Vérifier que l'email est dispo
        $req=$bdd->prepare('SELECT id_utilisateur,email,mdp,nom,prenom,telephone,date_naissance FROM utilisateurs WHERE email = ?');

        $req->bindParam(1,$email,PDO::PARAM_STR);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}



function addUser($bdd,$name,$firstname,$email,$phone,$dob,$password){
    try{
        //Préparer la requête d'enregistrement
        $req=$bdd->prepare('INSERT INTO utilisateurs (email,mdp,nom,prenom,telephone,date_naissance,id_role_utilisateur) VALUES (?,?,?,?,?,?,1)');

        //Binding de Param
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->bindParam(2,$password,PDO::PARAM_STR);
        $req->bindParam(3,$name,PDO::PARAM_STR);
        $req->bindParam(4,$firstname,PDO::PARAM_STR);
        $req->bindParam(5,$phone,PDO::PARAM_INT);
        $req->bindParam(6,$dob,PDO::PARAM_STR);

        //Executer la requête     
        if($req->execute()){
            return true;
        }
    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}
