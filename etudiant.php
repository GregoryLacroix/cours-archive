<?php
require_once("inc/init.php");

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_destroy();
}

require_once("inc/header.php");
?>


<?php
require_once("inc/footer.php");