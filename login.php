<?php 
require_once("inc/init.php");

if(!isset($_SESSION['membre']))
{
    header('Location: index.php');
}

if(isset($_POST["submit"])){
    //session_start();
    $class = '';
    if(!empty($_POST['pseudo']))
    {
        if(!preg_match('#^[a-zzéèàêâùïüëA-Z0-9]{2,20}+$#', $_POST['pseudo']))
        {
            $errorPseudo = '<p class="text-danger mt-2">! Les caractères spéciaux ne sont pas autorisés (entre 2 et 20 max)</p>';
            $class .= ' border border-danger';
        }
        else
        {
            $pseudo = $_POST["pseudo"];
            $pseudo = $pdo->quote($pseudo);
            $sql = "SELECT * FROM connected WHERE pseudo LIKE $pseudo LIMIT 1";
            $req = $pdo->query($sql);
            $data = $req->fetch(PDO::FETCH_ASSOC);
            if(empty($data)){
            //echo 'test';
            $ip = $_SERVER["REMOTE_ADDR"];
            $sql = "INSERT INTO connected(pseudo,ip,date) VALUES ($pseudo,'$ip',".time().")";
            $req = $pdo->query($sql);
            $idTchat = $pdo->lastInsertId();
            }
            else{
                if($data["ip"] == $_SERVER["REMOTE_ADDR"] && time()-$data["date"]<60 ){
                    $idTchat = $data["id"];
                }
                else if(time()-$data["date"]>60){
                    $idTchat =  $data["id"];
                }
                else{
                    $erreur = "<p class='font-italic text-danger text-center'>Ce pseudo est déja en cours d'utilisation</p>";
                }
            }
            if(!isset($erreur)){
                $_SESSION["pseudo"] = $_POST["pseudo"];
                $_SESSION["idTchat"] = $idTchat;
                header("location:tchat.php");
            }
        }
    }
    else
    {
        $emptyPseudo = '<p class="text-danger mt-2">Merci de saisir un pseudo</p>';
        $class .= ' border border-danger';
    } 
}



require_once("inc/header.php");
?>

<div class="col-11 col-sm-8 col-md-8 col-lg-6 mx-auto rounded container my-3 bg-light p-2 fond">

    <h1 class="display-4 text-center mt-4">Welcome to the TCHAT !!</h1>

    <img src="<?= URL ?>img/img1.png" alt="tchat message trop rapide" class="col-sm-12 col-md-12 col-lg-12">

    <h5 class="text-center mt-3 mx-4">Respectez vous les uns les autres !! Tout message posté à caractère rasciste, homophobe ou de quelque nature que ce soit sera bannit du TCHAT ! Le TCHAT vous permettra de discuter entre étudiants, de partager votre code, d'échanger autour de la programmation, de partager votre expérience mais aussi tout simplement de TCHATTER !!</h5>

    <?php if(isset($erreur)){ echo "<p>$erreur</p>"; }?>
    <form action="login.php" method="post" class="col-md-5 mx-auto text-center" style="margin: 10vh 0 5vh 0">
        <div class="form-group">
            <label for="pseudo">Entrer votre pseudo </label>
            <input type="text" class="form-control <?php if(isset($class)) echo $class; ?>" name="pseudo" id="pseudo">
            <?php if(isset($errorPseudo)) echo $errorPseudo; ?>
            <?php if(isset($emptyPseudo)) echo $emptyPseudo; ?>
        </div>
        <input type="submit" name="submit" value="Accéder au TCHAT" class="col-md-12 btn btn-dark">
    </form>

    <div class="col-6 col-sm-5 col-md-5 col-lg-5 col-xl-4 mx-auto"><img src="<?= URL ?>img/gif5.gif" alt="tchat message trop rapide" class="col-12 col-sm-12 col-md-12 col-lg-12"></div>

</div>

<?php 
require_once("inc/footer.php");