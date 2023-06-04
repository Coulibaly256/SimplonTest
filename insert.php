<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des participants</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main {
            width: 82vw;
            height: 90vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #000000;
            border-radius: .8rem;
            overflow: auto;
        }

        section h1 {
            width: 100%;
            height: 10%;
            background-color: #fff4;
            padding: .8rem 1rem;
        }

        section table {
            width: 95%;
            max-height: calc(89% - .8rem);
            background-color: #fffb;
            margin: .8rem auto;
            border-radius: .6rem;
            overflow: auto;
        }

        /* section table::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        section table:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        } */

        table {
            width: 100%;
            overflow: auto;
            margin: 0 auto;
        }

        table,
        th,
        td {
            padding: 1rem;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr:hover {
            background-color: #fff6;
        }
    </style>
</head>

<body>
    <?php
    include "connexion.php";

    if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["telephone"]) &&
        isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["gender"])
    ) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $mot_passe = $_POST["password"];
        $sexe = $_POST["gender"];

        $req = mysqli_query($link, "INSERT INTO user(nom, prenom, telephone, email, mot_passe, sexe) VALUES ('$nom','$prenom', '$telephone', '$email', '$mot_passe', '$sexe')");

        if ($req) {
            // echo "insertion effectuée";
        } else {
            // echo "erreur d'insertion";
        }
    }

    $query = mysqli_query($link, "SELECT * FROM user");

    if (mysqli_num_rows($query) > 0) {
        echo "
        <main>
            <section>
                <h1>La liste des participants</h1>
            </section>
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Sexe</th>
                        </tr>
                    </thead>
                    <tbody>
        ";

        while ($row = mysqli_fetch_assoc($query)) {
            echo "
            <tr>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td>{$row['telephone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['sexe']}</td>
            </tr>
            ";
        }

        echo "
                    </tbody>
                </table>
            </section>
        </main>
        ";
    }

    mysqli_close($link);
    ?>
</body>
</html>
