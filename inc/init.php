<?php
// CONNEXION BDD
$pdo = new PDO('mysql:host=cl1-sql20;dbname=rev39301', 'rev39301', 'pjTgh4P6EIqP', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $pdo = new PDO('mysql:host=localhost;dbname=rev39301', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// VARAIBLES
$error = '';
$content = '';

// SESSION
session_start();

// CHEMIN
// define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/cours-archive/");
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/");

// define("URL", 'http://localhost/cours-archive/');
define("URL", 'https://g-lacroix.cours-archive.fr/');

//----------INACTIVITE 
// INACTIVITE 
if(isset($_SESSION['temps'])) // si la session existe
{
	if(time()>($_SESSION['limite'] + $_SESSION['temps'])) // on v�rifie si le temps actuel (nb de seconde actuelle) est supp�rieur au temps du dernier affichage de la page + X minutes.
	{ 
		session_destroy();	// si c'est le cas, la page n'a pas �t� raffraichie depuis trop longtemps et on supprime la session pour inactivit�e trop longue ! session_destroy() est toujours effectu� en dernier.
		header("Location:" . URL . "connexion.php?action=destroy");
		//header("refresh:5;url=connexion.php?action=destroy" );
	}
	else
	{
		$_SESSION['temps'] = time(); // sinon, on remet le temps du dernier affichage � jour (cad: maintenant) pour relancer le temps.
		//echo "connexion mise à jour<hr />";
	}
}
else
{
	//echo "connexion<hr />";
	$_SESSION['limite'] = 300;// 120=2 minutes - on fixe le temps d'inactivit�e. 20 sec pour la d�mo en cours � ne pas exc�der.
	$_SESSION['temps'] = time(); // on enregistre le temps actuel (lors de l'affichage de la page).
}

// echo '<pre>'; print_r($_SESSION);echo'</pre>';

// INCLUSIONS
require_once("functions.php");

// FAILLES XSS
foreach($_POST as $key => $value)
{
	$_POST[$key] = strip_tags(trim($value));
}