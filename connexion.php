<?php
require_once("inc/init.php");

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') // si on clique sur le lien deconnexion, on supprime le session
{
  session_destroy();
}

if(internauteEstConnecte()) 
{
	header("location:" . URL . "index.php");
}

if(isset($_GET['action']) && $_GET['action'] == 'destroy') 
{
  $content .= '<div class="col-md-5 mx-auto alert bg-danger p-2 mb-2 rounded text-center alert-dismissible fade show" role="alert">
              <strong>Votre session a expirée ! Merci de vous reconnecter !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>';
}

//debug($_POST);
if($_POST)
{
    foreach($_POST as $key => $value)
    {
        $_POST[$key] = strip_tags(trim($value));
    }

    $resultat = $pdo->prepare("SELECT * FROM membre WHERE email = :email"); 
    $resultat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $resultat->execute();
	
	if($resultat->rowCount() != 0) 
	{
    $membre = $resultat->fetch(PDO::FETCH_ASSOC); 
    // $membre['mdp'] == $_POST['mdp']
		if(password_verify($_POST['mdp'], $membre['mdp'])) 
		{
			foreach($membre as $indice => $valeur) 
			{
				if($indice != 'mdp') 
				{
					$_SESSION['membre'][$indice] = $valeur; 
				}
			}
			//debug($_SESSION);
			header("location:index.php"); 
		}
		else 
		{
			$content .= '<div class="col-md-5 mx-auto alert bg-danger p-2 mb-2 rounded text-center alert-dismissible fade show" role="alert">
			<strong>! Un problème est survenu. Vérifier vos identifiants.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
	}
	else 
	{
        $content .= '<div class="col-md-5 mx-auto alert bg-danger p-2 mb-2 rounded text-center alert-dismissible fade show" role="alert">
				<strong>! Un problème est survenu. Vérifier vos identifiants.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
	}
}

require_once("inc/header.php");
?>

<div class="col-11 col-sm-10 col-md-5 col-lg-4 mx-auto rounded text-white my-3 bg-dark p-2">

  <h1 class="col-md-4 offset-md-4 display-4 text-center mt-4"><i class="fas fa-user-check"></i><hr></h1>
  <?= $content ?>
  <form method="post" class="col-md-6 offset-md-3">
    <div class="form-group">
      <label for="email">Adresse Email</label>
      <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="mdp">Mot de passe</label>
      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
    </div>
    <button type="submit" class="col-md-12 btn btn-secondary">Identifiez-vous</button>
    
  </form>

  <!-- -->
  <div id="carouselExampleIndicators" class="carousel slide col-md-12 mt-4 mb-3" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner arrondi-div">
      <div class="carousel-item active">
        <img class="d-block w-100 arrondi" src="<?= URL ?>img/developpement-web1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 arrondi" src="<?= URL ?>img/developpement-web3.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 arrondi" src="<?= URL ?>img/developpement.gif?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 arrondi" src="<?= URL ?>img/developpement-web4.jpg?auto=yes&bg=555&fg=333&text=Fourth slide" alt="Fourth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 arrondi" src="<?= URL ?>img/bs.png?auto=yes&bg=555&fg=333&text=Fourth slide" alt="Fourth slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- -->

</div>

<?php
require_once("inc/footer.php");
?>