
function surligne($champ, erreur) /* Colorisation des champs mal remplis */

{ if (erreur) $champ.style.borderColor = "#cf0000";
	else { $champ.style.borderColor = "#00ff00"; } }

function verifName($champ) /* Interdiction des chiffres pour le nom et prénom */

{ var $regex = /^[0-9]$/; 
	if(!$regex.test($champ.value))
	{ surligne($champ, false); alert("Veuillez rentrer un nom et un prénom valides");
	return false; }

	else { surligne($champ, true);
	return true; } }

function changeCasse() /* Transforme la saisie du nom et prénom en majuscules */

{   var $x = document.getElementById("nom_prenom");
	$x.value = $x.value.toUpperCase(); }

function verifNumber($champ) /* Interdiction des lettres pour le numéro de téléphone */

{ var $regex = /^[a-z]|[A-Z]$/; 
	if(!$regex.test($champ.value))
	{ surligne($champ, false); alert("Veuillez rentrer un numéro valide");
    return false; }

	else { surligne($champ, true);
    return true; } }

function verifMail($champ) /* Vérification de la validité de l'email */

{ var $regex = /^[a-z0-9._-]+@[a-z0-9._-]\.[a-z]$/; 
	if(!$regex.test($champ.value))
	{ surligne($champ, false); return false; }

	else { surligne($champ, true); alert("Veuillez rentrer une adresse valide");
	return true; } }

function verifMessage($champ) /* Définition des caractères interdits dans le corps du message */

{ var $regex = /^[~|{|[|\\||\|¤|$|/|<|§|>]$/; 
	if(!$regex.test($champ.value))
	{ surligne($champ, false); alert("Veuillez rentrer un texte valide");
	return false; }

	else { surligne($champ, true);
    return true; } }
