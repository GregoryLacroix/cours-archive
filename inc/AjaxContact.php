<?php
$tab = array();
$tab['msg'] = '';
$tab['validate'] = '';

if($_POST)
{
    if(!empty($_POST['object']) || !empty($_POST['messageContact']) || !empty($_POST['email']))
    {
        foreach($_POST as $key => $value)
        {
            $_POST[$key] = addslashes(trim($value));
            $_POST[$key] = strip_tags($value);
        }

        if(!filter_var($_POST['expediteur'], FILTER_VALIDATE_EMAIL))
        {
            $tab['msg'] .= '<div class="alert alert-danger col-md-12 text-center">Le format Email n\'est pas conforme. Merci de saisir un email valide!</div>';
            $tab['valid'] = true;
            
        }
        if(strlen($_POST['object']) < 2 || strlen($_POST['object']) > 20)
        {
            $tab['msg'] .= '<div class="alert alert-danger col-md-12 text-center">la taille de l\'object est invalide !! (entre 2 et 20 caractères)!!</div>';
            $tab['valid'] = true;
        }
        if(!isset($tab['valid']))
        {
            $destinataires = "g-lacroix@cours-archive.fr";
            $sujet = $_POST['object'];
            
            // Version MINE
            $entetes = "MIME-Version: 1.0\n";
            
            // en-têtes expéditeur
            $entetes .= "From : $_POST[expediteur]\n";
            
            // en-têtes adresse de retour
            $entetes .= "Reply-to : g-lacroix@cours-archive.fr\n";
            
            // personnes en copie
            // $entetes .= "Cc : formateur@tutovisuel.com\n";
            // $entetes .= "Bcc : impots@tutovisuel.com\n";
            
            // priorité urgente
            $entetes .= "X-Priority : 1\n";
            
            // type de contenu HTML
            $entetes .= "Content-type: text/html; charset=utf-8\n";
            
            // code de transportage
            $entetes .= "Content-Transfer-Encoding: 8bit\n";
            
            // message HTML
            $messageContact = $_POST['messageContact'];
            
            mail($destinataires, $sujet, $messageContact, $entetes);

            $tab['msg'] .= '<div class="alert alert-success col-md-12 text-center">Votre message a bien été envoyé, nous vous répondrons dans les plus bref délais.</div>';
        }
        
    }
    else {
        $tab['msg'] .= '<div class="alert alert-danger col-md-12 text-center">Merci de remplir tout les champs du formulaire !!</div>';
        $tab['valid'] = true;
    }
}


echo json_encode($tab);



