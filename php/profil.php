<?php 
    session_start();
    require_once 'bdd.php'; 
   
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
?>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Modification</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="profil.css">

  </head>

  <?php 
    if(isset($_GET['err'])){
      $err = htmlspecialchars($_GET['err']);
      switch($err){
            case 'current_password':
                echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                    break;
                    
            case 'login_size':
                echo "<div class='alert alert-success'>Le login est trop long ! </div>";
                    break;

            case 'success_password':
                echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                    break;
                    
                  }
    }
?>
<body>
<div class="signup-form">
    <form action="profil2.php" method="post">
		<h2>Change</h2>
		<p class="hint-text">Modifie ton compte mec</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="login" value='<?php echo $data['login']?>' required="required" autocomplete="on"></div>
			</div>        	
        </div>
        <div class="form-group">
        <div class="col"><input type="text" class="form-control" name="prenom" value="<?php echo $data['prenom'] ?>" required="required"autocomplete="on"> </div>
        </div>
        <div class="form-group">
        <div class="col"><input type="text" class="form-control" name="nom" value="<?php echo $data['nom'] ?>" required="required"autocomplete="on"> </div>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="mdp" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="newpassword" placeholder="New Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="verif" placeholder="Confirm New Password" required="required">
        </div>    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Modifier</button>
        </div>
    </form>
	<div class="text-center">Retourner sur la <a href="index.php"><u>page principal</u></a></div>
</div> 
</body>
</html>