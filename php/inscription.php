<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <link rel="stylesheet" type="text/css" href="inscription.css" />
   </head>
   <body id="body">
      <div id="conteneur">

         <form name="inscription" method="post" action="inscription2.php">
            <fieldset class="fieldset">
               <legend class="legend">Inscription</legend>
               <div class="label">
                  Pseudo
               </div>
               <div class="input">
                  <input type="text"  name="pseudo" class="champ" />
               </div><br />
               <div class="label">
                  Nom
               </div>
               <div class="input">
                  <input type="text"  name="nom" class="champ" />
               </div><br />
               <div class="label">
                  Prénom
               </div>
               <div class="input">
                  <input type="text"  name="prenom" class="champ" />
               </div><br />
               <br />
               <div class="label">
                  Mot de passe
               </div>
               <div class="input">
                  <input type="password" name="mdp" class="champ" />
               </div><br />
               <div class="label">
                  Confirmer
               </div>
               <div class="input">
                  <input type="password" name="verif" class="champ" />
               </div><br />
               <div class="label">
                  
               </div>
               <div class="input">
                  <input type="submit" name="sinscrire" value="S'inscrire" class="champ" />
               </div><br />
            </fieldset>

    <?php 
        if(isset($_GET['reg_err']))
        {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err)
            {
                case 'success':
                ?>
                    <div class="alert alert-success">
                        <strong>Bravo</strong> Inscription réussie !
                        <?php header('Location: connection.php'); die(); ?>
                    </div>
                <?php
                break;

                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Mot de passe différent
                    </div>
                <?php
                break;

                case 'pseudo_length':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Pseudo trop long mec
                    </div>
                <?php 
                
                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Compte déja existant 
                    </div>
                <?php 

            }
        }
        ?>













         </form>
      </div>
   </body>
</html>