<?php 
    session_start();
    require_once 'bdd.php'; 

    
    if(isset($_SESSION['user'])){
    //    Recupère bdd
       $req = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
       $req->execute(array($_SESSION['user']));
       $data = $req->fetch();
    }
    

    ?>
    <?php if (isset($_POST['deconnexion'])){ 
                 session_destroy();
                 header('Location:index.php');
            } 

                 ?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div style="background: url(https://media.gettyimages.com/photos/zillion-pills-picture-id157287767?k=20&m=157287767&s=612x612&w=0&h=633eXRauU9AlyRDeFlZbLQl-T5jEpeeamux1y6fTj-M=)" class="jumbotron bg-cover text-white" >
    <div class="container py-5 text-center">
        <h1 class="display-4 font-weight-bold">Bienvenido <?php if(isset ($data['login'])){echo $data['login'];} ?></h1>

        <p class="font-italic">Github by <a href= "https://github.com/jasmine-messaadi" role="button" <u>Jasmine</u> </a> 
        </p> 
        <?php 
        if (isset($data['login'])) {
            echo  "<form method='post' action = '#' > <input type=\"submit\" name=\"deconnexion\" value=\"Deconnexion\" class=\"btn btn-primary px-5\" /> </form>";
            echo  "<form method='post' action = 'profil.php' > <input type=\"submit\" name=\"modification\" value=\"Modification\" class=\"btn btn-primary px-5\" /> </form>";
        }

        else {
            echo "<a href=\"inscription.php\" role=\"button\" class=\"btn btn-primary px-5\">Inscription</a><br/><br/>";
            echo  "<a href=\"connection.php\" role=\"button\" class=\"btn btn-primary px-5\">Connexion</a>";
         
        }
        ?>
        <br/>
	 
            
            
        </div>

    </div>
</div>

<!-- Texte -->
<div class="container py-5">
    <h2 class="h3 font-weight-bold">十場師白一產此童體媽北一</h2>
    <div class="row">
        <div class="col-lg-10 mb-4">
            <p class="font-italic text-muted">政法政刻、得些電不性，健倒任見國價？來差我心雲，在命我司人這大的說教分賽人得切民理天好之花他導，成議神所一關地來家家府期好的念富官去心持過的已女去賣河要果不好而使一的醫如驚研銀國議建他基最灣工這命外條女造標；好正方家成，太文因意選知、間不但司市統唱而斯操可充比目早多族不年服物應毛調政在……去快護人標長總我：學得千導，營住路紅。</p>
            <p class="font-italic text-muted">порядком судебного тех гласного котором путем человек установлена невиновным имеет судебного будет не путем все гласного невиновным при человек для.</p>
        </div>
        <div class="col-lg-8">
            <p class="font-italic text-muted">
ନ୍ୟାୟିକ ଆଦେଶ ହେଉଛି ସେହି ଉପାୟ ଯାହା ଦ୍ person ାରା ବ୍ୟକ୍ତି ନିର୍ଦ୍ଦୋଷ ଭାବରେ ପ୍ରତିଷ୍ଠିତ ହୁଏ ନ୍ୟାୟିକ ବ୍ୟକ୍ତି ସେହି ବ୍ୟକ୍ତିଙ୍କ ପାଇଁ ନିର୍ଦ୍ଦୋଷର ମାର୍ଗ ହେବ ନାହିଁ | 
நீதித்துறையின் ஆணை என்பது, ஒரு நபர் நிரபராதி என்று நிலைநிறுத்தப்படும் விதத்தில் நீதித்துறை இருக்க முடியாது.
</p>
        </div>
    </div>
</div>

<html>
                
