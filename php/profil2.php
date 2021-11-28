<?php   
    session_start();
    require_once 'bdd.php';

    // Si session existe pas 
    if(!isset($_SESSION['user']))
    {
        header('Location:index.php');
        die();
    }

// Si les variables existent 
if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['newpassword']) && !empty($_POST['verif'])){
    
    // Sécu XSS 
    $new_login = htmlspecialchars($_POST['login']);
    $new_firstname = htmlspecialchars($_POST['prenom']);
    $new_name = htmlspecialchars($_POST['nom']);
    $current_password = htmlspecialchars($_POST['mdp']);
    $new_password = htmlspecialchars($_POST['newpassword']);
    $new_password_retype = htmlspecialchars($_POST['verif']);

     
      $check = $bdd->prepare('SELECT * FROM utilisateur WHERE id = :id');
      $check->execute(array(
          "id" => $_SESSION['user']
      ));
      $data = $check->fetch();

      // Si mdp est bon
      if(password_verify($current_password, $data['password']))
      {
        if(strlen($new_login) <= 100){
          // Si mdp est bon
          if($new_password === $new_password_retype){

              // Chiffrement
              $cost = ['cost' => 12];
              $new_password = password_hash($new_password, PASSWORD_BCRYPT, $cost);

              // MAJ la table utilisateurs
              $update = $bdd->prepare('UPDATE utilisateur SET login = :login,prenom = :prenom ,nom = :nom,password = :password WHERE id = :id');
              $update->execute(array(
                  "login" => $new_login,
                  "prenom" => $new_firstname,
                  "nom" => $new_name,
                  "password" => $new_password,
                  "id" => $_SESSION['user']
              ));
              // On redirige
              header('Location: profil.php?err=success_password');
              die();
            }
        }else{
            header('Location: profil.php?err=login_size');
        }
     }else{
                header('Location: profil.php?err=current_password');
                die();
             }

}
else{
    header('Location: profil.php');
    die();
}

?>