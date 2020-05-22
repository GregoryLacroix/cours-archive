<?php
//------------- FONCTION DEBUG
function debug($var, $mode = 1)
{
	echo '<div style="background: orange; padding: 5px;">';
	$trace = debug_backtrace(); // fonction prédéfinie retournant un tableau ARRAY contenat des informations tel que la ligne et le fichier où est executé la fonction
	//echo '<pre>'; print_r($trace); echo '</pre>';
	$trace = array_shift($trace); // 
	//echo '<pre>'; print_r($trace); echo '</pre>';
	echo "Debug demandé dans la fichier : $trace[file] à la ligne $trace[line]. <hr>";
	if($mode === 1)
	{
		echo '<pre>'; print_r($var); echo '</pre>'; 
	}
	else
	{
		echo '<pre>'; var_dump($var); echo '</pre>';
	}
	echo '</div>';
}

//------------------------------------------
function internauteEstConnecte() // cette fonction indique si le membre est connecté
{
	if(!isset($_SESSION['membre'])) // si l'indice membre dans le fichier session n'est pas définit, c'est que l'internaute n'est pas passé par la page connexion
	{
		return false;
	}
	else
	{
		return true;
	}
}

//-----------------------------------------
function internauteEstEtudiant()
{
	if(!isset($_SESSION['student'])) // si l'indice membre dans le fichier session n'est pas définit, c'est que l'internaute n'est pas passé par la page connexion
	{
		return false;
	}
	else
	{
		return true;
	}
}

//------------------------------------------
function internauteEstConnecteEtEstAdmin()
{ // cette fonction m'indique si le membre est admin
	if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) // si la session du memebre est définie et que son statut est à 1, cela veut dire qu'il est admin, on retourne true
	{
		return true;
	}
	else
	{
		return false;
	}
}

//-----------------------------------------------------------------
// FONCTION SUPPRESSION DOSSIER NON VIDE
function rrmdir($dir) {
	if (is_dir($dir)) {
	  $objects = scandir($dir);

	  //debug($objects);

	  foreach ($objects as $object) {
		if ($object != "." && $object != "..") {
			//echo $dir."/".$object . '<br>';

		  if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
		}
	  }
	  reset($objects);
	  rmdir($dir);
	}
  }