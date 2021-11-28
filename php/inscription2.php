<?php

require_once 'bdd.php'; 

if(!empty($_POST['pseudo']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['verif']))
{

    // Création de variable pour chaque données avec sécu
    $login = htmlspecialchars($_POST['pseudo']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $password = htmlspecialchars($_POST['mdp']);
    $verify = htmlspecialchars($_POST['verif']);

     
     $check = $bdd->prepare('SELECT * password FROM utilisateur WHERE login = ?'); 
     $check->execute(array($login));
     $data = $check->fetch();
     $row = $check->rowCount();

    if($row == 0){ 
        if(strlen($login) <= 100){ 
            if($password === $verify){ 

                          // Hashage avec Bcrypt, via un coût de 12
                          $cost = ['cost' => 12];
                          $password = password_hash($password, PASSWORD_BCRYPT, $cost);


                          // On insère dans la base de données
                          $insert = $bdd->prepare('INSERT INTO utilisateur (login,prenom,nom,password) VALUES(:login, :prenom, :nom, :password)');
                          $insert->execute(array(
                              'login'    => $login,
                              'prenom'   => $prenom,
                              'nom'      => $nom,
                              'password' => $password,
                          ));
                          // On redirige avec le message de succès
                          header('Location:inscription.php?reg_err=success');
                          die();                     
            }else{ header('Location: inscription2.php?reg_err=password'); die();}
        }else{ header('Location: inscription2.php?reg_err=pseudo_length'); die();}
    }else{ header('Location: inscription2.php?reg_err=already'); die();}
}

?>