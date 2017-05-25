<?php
  // Definition des constantes et variables
  define('LOGIN','toto');
  define('PASSWORD','tata');
  $errorMessage = '';
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['login'] !== LOGIN) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== PASSWORD) 
      {  
        $errorMessage = 'Mauvais mot de passe !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;
        // On redirige vers le fichier admin.php
        header('Location: backoffice.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>
<!DOCTYPE html >
<html lang="fr-fr">
  <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel = "stylesheet" type = "text/css" href="CSS/style.css"/>
  <title>Alec Meyer photographie</title>
  </head>
  <body id="connexion">
    <div>
  <h2> Connexion / S'identifier</h2>
  <h3>Connectez-vous à votre espace personnel</h3>
</div>
    <form action="" id="fromconnexion" name="backoffice" enctype="multipart/form_data" method="post">
    <a href="index.php"><img id="connexionBack" src="Image/connexionBack.jpeg" alt="Logo"/></a>
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
          }
        ?>
       <p>
          <label for="login">Login :</label> 
          <input type="text" name="login" id="login" value="" />
        </p>
        <p>
          <label for="password">Mot de passe :</label> 
          <input type="password" name="password" id="password" value="" />
        </p>
         <p>
          <input type="submit" name="submit" value="Se connecter" />
        </p>
      </fieldset>
    </form>
  </body>
</html>