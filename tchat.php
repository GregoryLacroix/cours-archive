<?php 
require_once('inc/init.php');

if(!isset($_SESSION["pseudo"]) || empty($_SESSION["pseudo"])){
	header("location:index.php");
}

require_once('inc/header.php');
?>

<div id="conteneur">

    <div class="bg-dark rounded p-2 mt-3 col-11 col-md-8 mx-auto text-white fond2">

        <h1 class="text-center mt-4">Bienvenue sur le Tchat <strong class="text-white"><?php echo $_SESSION["pseudo"]; ?></strong></h1>
        <p class="text-center">Pour quitter le tchat cliquez <a href="https://g-lacroix.cours-archive.fr/index.php?action=quitter" class="alert-link text-white">ici</a></p>
    
    </div>

    <div id="connected" class="col-11 col-md-8 bg-dark p-2 mt-1 rounded text-white mx-auto mb-1">
        
    </div>

    <div id="tchat" class="col-11 col-md-8 mb-3 rounded p-1 mx-auto fond2" style="height: 100vh; background: #EBEBEB; overflow-y: auto;">
        <?php
       
        ?>
    </div>
    </div>

    <div id="tchatForm" style="position: relative !important; top: 10% !important; margin-bottom: 0 !important; width:100% !important">
        <form method="post" action="#" class="">

            <div class="d-flex flex-row">
                <div class="form-group m-0 px-0 col-11 col-md-11" style="">
                    <label class="sr-only" for="message">Name</label>
                    <textarea type="text" style="height:80px !important; border-radius: 0 !important; resize: none !important;" class="form-control" name="message" id="message" placeholder="Saisir votre message"></textarea>
                </div>
                <button type="submit" id="submit" class="col-1 col-md-1 py-0 btn" style="border-radius: 0 !important; background: #C5F3C2 !important" title="Poster"><i class="far fa-paper-plane"></i></button>
            </div>
    </form>      
</div>

<?php 
require_once('inc/footer.php');