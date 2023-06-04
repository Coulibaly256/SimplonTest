<?php

include "connexion.php";

if(isset($_POST["nom"])
&& isset($_POST["prenom"])
&& isset($_POST["telephone"])
&& isset($_POST["email"])
&& isset($_POST["password"])
&& isset($_POST["gender"])
)

{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $mot_passe = $_POST["password"];
    $sexe = $_POST["gender"];


    $req = mysqli_query($link, "insert into user(nom, prenom,telephone,email,mot_passe,sexe)
     values('$nom','$prenom', '$telephone', '$email', '$mot_passe', '$sexe)");


    if($req)
    {
        echo "insertion effectuée";
    }
    else{
        echo "erreur d'insertion";
    }
}

?>