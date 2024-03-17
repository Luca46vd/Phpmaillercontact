<?php
if (!empty($_POST)) {
    extract($_POST);
    $valide = true;
    if (empty($nom)) {
        $valide = false;
        $erreurnom = "Vous n'avez pas rempli le champ nom";
    }
        if (empty($phone)) {
            $valide = false;
            $erreurphone = "Vous n'avez pas rempli le champ numéro de téléphone";
    }
    if (!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i", $email)) {
        $valide = false;
        $erreurmail = "Votre email n'est pas valide";
     
    }
    if (empty($email)) {
        $valide = false;
        $erreurmail = "Vous n'avez pas rempli le champ mail";
    }

    if (empty($message)) {
        $valide = false;
        $erreurmessage = "Vous n'avez pas rempli le champ message";

    }
}
    ?>
<!DOCTYPE html>      
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Remplisez ce formulaire, pour nous contactez ou appellez c'est numéro pour prendre rendez-vous">
  <meta name="og:title" property="og:title" content="Chazay Optique Audition - Contact">
  <meta property="og:locale:alternate" content="fr_FR"/>
  <meta property="og:image" content="https://chazayoptiqueaudition.fr/img/facade2.jpg"/>
  <title>Chazay Optique Audition - Contact</title>
  <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="css/contact.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RTD1T2DPVJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "G-RTD1T2DPVJ");
</script>
</head>
<header>
    <nav>
        <?php include "header.html";?>
    </nav>
</header>
<body>
    <?php 
    if (isset($erreur)){ echo "<p>$erreur</p>"; }
    ?>
    <br id="br">
    <br>
    <div class="fom">
      <form method="POST" action="mail.php" enctype="multipart/form-data">
        <input name="firstname" type="text" id="firstname" class="hide-robot" style="display:none;">
        <div id="flx">
            <div id="colum">
                <div id="info">
                    <p>Pour nous contacter :</p>
                    <p>Optique : <a href="tel:+33478431830">04.78.43.18.30</p></a>
                    <p>Audition : <a href="tel:+33478431539">04.78.43.15.39</p></a>
                    <p>Mail :<a href="mailto:chazay.optique@orange.fr">    chazay.optique@orange.fr</p></a>
                </div>
            </div>
            <div>
                <input type="text" name="nom" placeholder="Votre nom et votre prénom" id="nom" class="name">
        
            <br>
                <span class="error-message-nom"><?php if(isset($erreurnom)) echo $erreurnom; ?></span>
                 <br>
                <input type="tel" name="phone" placeholder="Votre numéro de téléphone" class="phone" >
                <br>
                <span class="error-message-phone"><?php if(isset($erreurphone)) echo $erreurphone;?></span>
                <br>
                <input type="mail" name="email" placeholder="Votre email" class="mail" >
                <br>
                <span class="error-message-mail"><?php if(isset($erreurmail)) echo $erreurmail; ?></span>
                <br>
         
                <div id="fichier">
                <label for="ordonnance" class="label">Déposez votre ordonnance :</label>

                <input type="file" id="ordonnance" name="file[]" multiple="multiple">
                </div>
                <br>
                <textarea type="text" name="message" class="sujet" placeholder="Votre message" ></textarea>  
                <br>    
                <span class="error-message-text"><?php if(isset($erreurmessage)) echo $erreurmessage; ?></span>
                <br>
                <br>
                <input type="submit" name="submit" value="Envoyer votre message" class="submit"><div class="info">
             </div>
        </div>
    </div>
        </div>
        </form>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php include "footer.html" ?>
</body>
</html>
<script type="text/javascript">
function cocher() {
    document.getElementById("att").style.display="block";
}
</script>