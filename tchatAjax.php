<?php 
require_once 'inc/init.php';
$d = array();

if(!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo']) || !isset($_POST['action']))
{
   
    $d['erreur'] = 'Vous devez être connecté pour pouvoir poster des messages!!';
}
else {
    extract($_POST);
    //---- ACTION : addMessage
    // permet l'ajout de message
    if($_POST['action'] == 'addMessage')
    {
        $pseudo = $_SESSION['pseudo'];
        $resultat = $pdo->prepare("INSERT INTO messages (pseudo, message, date) VALUES (:pseudo, :message, NOW())");
        $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultat->bindValue(':message', strip_tags($message), PDO::PARAM_STR);
        $resultat->execute();
        // $resultat = $pdo->exec("INSERT INTO tchat (pseudo, message, date) VALUES ('$pseudo', '$message', NOW())");
        $d['erreur'] = 'ok';
    }

    // permet l'affichage des derniers messages
    if($_POST['action'] == 'getMessage')
    {
        $lastid = floor($lastid);
        $resultat = $pdo->query("SELECT id, pseudo, message, DATE_FORMAT(date, '%d/%m/%Y') AS datefr,  DATE_FORMAT(date, '%H:%i:%s') AS heurefr FROM messages WHERE id > $lastid ORDER BY date");
        $d['result'] = "";
        $d['lastid'] = $lastid;
        while($message = $resultat->fetch(PDO::FETCH_ASSOC))
        {   
            if($_SESSION['pseudo'] === $message['pseudo'])
            {
                $d['result'] .= "
            
                <div class='col-md-12 m-0 p-0 text-right'>
                    <div class='text-dark rounded m-1 p-1 mw-75' style='background: #C5F3C2; display: inline-block; max-width: 75% !important;'>
                        
                        <p class='col-md-12 pb-0 mb-0 text-left'>"; 
                        
                        $array = explode(' ', $message['message']);

                        $terme = 'https';
                        foreach($array as $key => $value)
                        {
                            
                            // echo '<pre>'; print_r(strpos($value, $terme)); echo '</pre><hr>';
                            if(strpos($value, $terme) === 0)
                            {

                                // $video = str_replace($value, 'watch?v=', "embed/");
                                // $d['result'] .= "<a href='$value' target='_blank' class='text-dark alert-link'>$value</a>";

                                $d['result'] .= "<iframe allowfullscreen='' http-equiv='X-Frame-Options' content='sameorigin' frameborder='0' height='315' src='$value' width='560'></iframe>";
                            }
                            else
                            {
                                $d['result'] .= ' ' . htmlentities($value) . ' ';
                            }
                        }

                        $d['result'] .= "</p>
                
                    </div>
                </div>";
            }
            else
            {
                $d['result'] .= "
            
                <div class='col-md-12 m-0 p-0'>
                    <div class='text-dark rounded m-1 p-1 mw-75' style='background: #D5D5D5; display: inline-block; max-width: 75% !important;'>

                        <p class='col-md-12 font-italic' style='font-size: 11px;'>Posté par <strong>$message[pseudo]</strong>, le $message[datefr] à $message[heurefr]</p>
                        <p class='col-md-12 pb-0 mb-0'>";
                        
                        $array = explode(' ', $message['message']);

                        $terme = 'http';
                        foreach($array as $key => $value)
                        {
                            
                            // echo '<pre>'; print_r(strpos($value, $terme)); echo '</pre><hr>';
                            if(strpos($value, $terme) === 0)
                            {
                                $d['result'] .= "<a href='$value' target='_blank' class='text-dark alert-link'>$value</a>";
                            }
                            else
                            {
                                $d['result'] .= ' ' . htmlentities($value) . ' ';
                            }
                        } 
                        
                        $d['result'] .= "</p>
                
                    </div>
                </div>";
            }
                
            $d['lastid'] = $message['id'];
        }
        $d['erreur'] = 'ok';
    }


    if($_POST["action"]=="getConnected"){
        $now = time();
        $sql = "SELECT pseudo FROM connected WHERE $now-date<60";
        $req = $pdo->query($sql);
        $d["result"] = "<span class='text-white'>Connectés au TCHAT : </span>";
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $d["result"] .= "<strong>". $data["pseudo"].", </strong>";
        }
        $d["result"]  = substr($d["result"],0,-2);
        
        $sql = "UPDATE connected SET date = $now WHERE id={$_SESSION["idTchat"]}";
        $pdo->query($sql);
        
        $d["erreur"] = "ok";
    }
}

echo json_encode($d);


