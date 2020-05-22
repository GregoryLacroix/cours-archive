<?php
require_once 'inc/init.php';

if (!internauteEstConnecte())
{
    header("location:" . URL . "connexion.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'quitter')
{
    unset($_SESSION['pseudo']);
    header('location:' . URL . 'index.php');
}

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_destroy();
}

if(isset($_POST['submit']))
{
    if(empty($_POST['commentaire']))
    {
      $errorComment = '<p class="font-italic text-danger text-center">! Merci de saisir un commentaire.</p>';
      $class = " border border-danger";
    }
    else
    {
      $insertComment = $pdo->prepare("INSERT INTO commentaire (commentaire, date_enregistrement) VALUES (:commentaire, NOW())");
      $insertComment->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
      $insertComment->execute();
    }
}

require_once 'inc/header.php';
?>

<?php if (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 'admin'): ?>

<div class="col-11 col-sm-10 col-md-8 col-lg-8 mx-auto mx-auto rounded container my-3 bg-light p-2 fond">

  <h4 class="display-4 text-center mt-4"><i class="far fa-file-archive"></i><hr></h4>

  <div class="d-flex flex-row flex-wrap justify-content-center">
  <?php
    echo $content;

    $resultat = $pdo->query("SELECT * FROM archive ORDER BY color");

    if ($resultat->rowCount() > 0):

        while ($archive = $resultat->fetch(PDO::FETCH_ASSOC)):
            //debug($archive);
            
?>

  <button type="button" class="col-sm-5 col-md-4 col-lg-3 btn btn-<?=$archive['color'] ?> p-4 m-4 text-light font-weight-bold" data-toggle="modal" data-target="#<?=strtoupper($archive['folder']) ?>"><?=strtoupper($archive['folder']) ?></button>

  <div class="modal fade text-center" id="<?=strtoupper($archive['folder']) ?>" role="dialog" aria-labelledby="Module:<?=strtoupper($archive['folder']) ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Module-<?=strtoupper($archive['folder']) ?>">Folder to download <?=strtoupper($archive['folder']) ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php foreach ($archive as $key => $value): //debug($key);
                 ?>
        
          <?php if ($key != 'folder' && $key != 'color' && $key != 'idArchive'): ?>
            <a href="<?=$value
?>" class="alert-link text-info text-center" title="Module:<?=strtoupper($archive['folder']) ?>"><?=$key ?>&nbsp;<?=strtoupper($archive['folder']) ?></a><br><br>
          <?php
                endif; ?>
        <?php
            endforeach; ?>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php
        endwhile;
    else:
        echo '<div class="text-dark"><strong>Aucune archive! Vous pouvez en ajouter en cliquant <a href="' . URL . 'ajout.php" class="alert-link text-info">ici</a></strong></div>';
    endif;
    echo '</div>';
?>

  </div>

  <?php
elseif (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 'student'):

    //echo '<pre>'; print_r($_SESSION); echo '</pre>';
    
?>

<div class="col-11 col-sm-10 col-md-8 col-lg-7 mx-auto mx-auto rounded container my-3 bg-light p-2 fond">

  <h2 class="display-4 text-center my-4">Bienvenue dans votre espace Etudiant !!</h2>

  <div class="col-12 col-sm-10 col-md-10 col-lg-10 mx-auto"><img src="<?= URL ?>img/img3.png" alt="programmation web" class="col-sm-12 col-md-12 col-lg-12"></div>

  <div class="container p-0">

    <h5 class="text-center m-5">Un problème de code ? Une question ? Vous trouverez ici à votre disposition tous les supports de cours et travaux pratique dont vous aurez besoin. L'accès au TCHAT vous permettra de communiquer entre étudiants, de vous entraider si vous avez besoin de conseils ou tout simplement de discuter !!</h5><hr class="col-7 col-md-5 mx-auto my-4 p-0">

    <p class='text-center'><a href="<?= URL ?>login.php" class="col-8 col-md-4 col-lg-3 btn btn-dark">Accès au TCHAT</a></p><hr class="col-7 col-md-5 mx-auto my-4 p-0">

    <p class="text-center"><i class="fas fa-graduation-cap"></i> Liste des supports de cours et travaux pratique</p>

    <div class="d-flex flex-row flex-wrap justify-content-center">
      <?php

    $resultat = $pdo->query("SELECT folder, color,support,evaluation FROM archive ORDER BY color");

    if ($resultat->rowCount() > 0):

        while ($archive = $resultat->fetch(PDO::FETCH_ASSOC)):
            //debug($archive);
            
?>

      <button type="button" class="col-sm-5 col-md-4 col-lg-3 btn btn-<?=$archive['color'] ?> p-4 m-4 text-light font-weight-bold" data-toggle="modal" data-target="#<?=strtoupper($archive['folder']) ?>"><?=strtoupper($archive['folder']) ?></button>

      <div class="modal fade text-center" id="<?=strtoupper($archive['folder']) ?>" role="dialog" aria-labelledby="Module:<?=strtoupper($archive['folder']) ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Module-<?=strtoupper($archive['folder']) ?>">Dossier à télécharger <?=strtoupper($archive['folder']) ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php foreach ($archive as $key => $value): //debug($key);
                 ?>
            
              <?php if ($key != 'folder' && $key != 'color' && $key != 'idArchive'): ?>
                <a href="<?=$value
?>" class="alert-link text-info text-center" title="Module:<?=strtoupper($archive['folder']) ?>"><?=$key ?>&nbsp;<?=strtoupper($archive['folder']) ?></a><br><br>
              <?php
                endif; ?>
            <?php
            endforeach; ?>  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>

      <?php
        endwhile;
?>
    </div>
  </div>
</div>

    <div class="col-11 col-sm-10 col-md-8 col-lg-7 mx-auto mx-auto rounded container mt-4 mb-3 bg-light p-2 fond">

      <h5 class="text-center my-2">Ce site vous est dédié ! Si vous souhaitez voir des améliorations, n'hésitez pas à partager vos idées et à poster un commentaire :</h5><hr>

      <?php 
      $data = $pdo->query("SELECT commentaire, DATE_FORMAT(date_enregistrement, 'le %d/%m/%Y à %H:%i') AS dateFr FROM commentaire ORDER BY date_enregistrement LIMIT 0,5");
      
      if($data->rowCount()):

        while($comments = $data->fetch(PDO::FETCH_ASSOC)):
          //echo '<pre>'; print_r($comments); echo '</pre>';
      ?>
        <div class="ml-2 my-2">
          <p class="" style="font-size: 10px;">Posté <?= $comments['dateFr'] ?></p>
          <p class="font-italic"><?= $comments['commentaire'] ?></p><hr>
        </div>

      <?php
        endwhile;

      else:
      ?>

      <p class="text-center font-italic my-4">Soyez le premier à poster un avis</p>

      <?php endif; ?>

      <?php if(isset($errorComment)) echo $errorComment; ?>
      <form action="" method="post">
        <div class="form-group">
          <textarea class="form-control <?php if(isset($class)) echo $class; ?>" id="commentaire" name="commentaire" placeholder="Saisir votre commentaire..." rows="3" style="resize: none !important;"></textarea>
        </div>
        <input type="submit" id="submit" name="submit" value="Poster" class="btn btn-dark">
      </form>

    </div>

<?php
    endif;
endif;

require_once 'inc/footer.php';

