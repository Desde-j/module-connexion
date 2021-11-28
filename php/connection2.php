<?php 
    session_start(); 
    require_once 'bdd.php'; 

    if(!empty($_POST['pseudo']) && !empty($_POST['password'])) 
    {
        // Patch sécu XSS
        $login = htmlspecialchars($_POST['pseudo']); 
        $password = htmlspecialchars($_POST['password']);
        
        
        
        $check = $bdd->prepare('SELECT * FROM utilisateur WHERE login = ?'); // '?' sécu injection SQL
        $check->execute(array($login));
        $data = $check->fetch();
        $row = $check->rowCount();
        
     
        if($row > 0)
        {
                // Si mot de passe OK
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['id'];
                    header('Location:index.php');
                    die();
                }else{ header('Location: connection2.php?login_err=password'); die(); }
        }else{ header('Location: connection2.php?login_err=already'); die(); }
    }else{ header('Location: connection2.php'); die();} // si formulaire envoyé sans aucune données


?>