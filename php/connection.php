<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="connection.css" />
    </head>
    <body>
        <div id="container">
            <!-- Zone de connexion -->
            
            <form action="connection2.php" method="POST">
                <h1>Connecte toi mec !</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="pseudo" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >

                <?php 
                if(isset($_GET['login_err']))
                {
                    // Petite sécu
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Compte inexistant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            </form>
        </div>
    </body>
</html>