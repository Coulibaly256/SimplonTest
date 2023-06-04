<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des participants</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        main.table {
            width: 82vw;
            height: 90vh;
            background-color: 
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #000000;
        }
    </style>
</head>
<body>

<?php

include "connexion.php";

 // Récupérer les informations des participants depuis la base de données
 $query = mysqli_query($link, "SELECT * FROM user");


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



    $req = mysqli_query($link, "insert into user(nom, prenom,telephone,email,mot_passe,sexe) values ('$nom','$prenom', '$telephone', '$email', '$mot_passe', '$sexe')");


    if($req)
    {
        // echo "insertion effectuée";
    }
    else{
        // echo "erreur d'insertion";
    }
}

// Vérifier s'il y a des participants
if (mysqli_num_rows($query) > 0){
    // Afficher le tableau des participants
    echo "<table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Sexe</th>  
                </tr>
            </thead>";
            // Parcourir les resultats de la requête
        while($row = mysqli_fetch_assoc($query)){
            echo "<tbody>
                    <tr>
                        <td>".$row['nom']."</td>
                        <td>".$row['prenom']."</td>
                        <td>".$row['telephone']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['sexe']."</td>
                    </tr>
                </tbody>";
        }
        
        echo "</table>";
    } else {
        echo "Aucun participant enregistré.";
    }

    //Fermer la connexion à la base de données
    mysqli_close($link);

?>

</body>
</html>