<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="">
</head>

<body>

        <!-- CONNECTION ET SELECTION DE LA BD-->
    <?php
        session_start();
        require_once 'bdd.php'; 

        // On récupere les données de l'utilisateur
        $req = $bdd->query('SELECT * FROM utilisateur');
    ?>

        <!-- TABLEAU -->

        <table>
            <!-- entete -->
    <thead>
    <tr> 
        <th scope="col">id</th>
        <th scope="col">login</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
        <th scope="col">password</th>
    </tr>
    </thead>
            <!-- corps-->
    <tbody>
        <?php
            while ($donnees = $req->fetch())
            {
                //id et nom du client en cours
                echo "</TR>";
                echo "<TH> $donnees[id] </TH>";
                echo "<TH> $donnees[login] </TH>";
                echo "<TH> $donnees[prenom] </TH>";
                echo "<TH> $donnees[nom] </TH>";
                echo "<TH> $donnees[password] </TH>";
                echo "</TR>";
            }
        ?>  
    </tbody>    
    </table>
    
    </body>