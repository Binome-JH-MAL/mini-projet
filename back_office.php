<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: connexion.php');
  exit();
}
?>
<DOCTYPE html>
<html lang="fr-fr">
<head>
<meta charset='utf-8'>
<link href="CSS/style.css" type = "text/css" rel="stylesheet"/>
<title>Alec Meyer backoffice</title>

<?php 
    echo 'Bienvenue ', $_SESSION['login'];
?>
</head>

<body id="connexion">

<?php include 'Includes/menu2.php' ;?>

<?php
  try
  {
    //Connection base de donnée
    $bdd = new PDO('mysql:host=localhost;dbname=alecmeyer;charset=utf8','root','');  
  }
  catch(Exception $e)
  {
    //En cas d'erreur affiche message
      die('Erreur : '.$e->getMessage());
  }

$reponse = $bdd->query('SELECT * FROM utilisateurs');

while ($donnees= $reponse->fetch())
{
?>

<table>
  <thead>
  <tr>
    <th>Titre de l'article</th>
    <th>Catégorie de l'article</th>
    <th>Date de modification de l'article</th>
    <th>Login de la personne qui a modifié</th>
    <th>Modifier articlier</th>
    <th>Supprimer article</th>
  </tr>
  </thead>
  <tr>
    <th><?php echo $donnees['nom']; ?></th>
    <th><?php echo $donnees['prenom']; ?></th>
    <th></th>
    <th></th>
    <th><a href="articlemodif.php">Modifier</a></th>
    <th></th>
  </tr>
</table>

<a href="articlemodif.php">Créer un article</a>
<a href="message.php">Message</a>
  <p>
  L'utilisateur <?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?>
  avec l'email <?php echo $donnees['mail']; ?> vient de laisser ce message :<br/>
  <?php echo $donnees['Message']; ?>
  </p>
<?php
}  
$reponse->closeCursor();
?>

</body>
</html>