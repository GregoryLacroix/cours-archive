<?php
require_once 'inc/init.php';

if(!internauteEstConnecte())
{
	header("location:" . URL . "connexion.php");
}

foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
}

// echo RACINE_SITE;
// debug($_POST);
// debug($_FILES);
if(isset($_POST['enregistrer']))
{
    $communication_bdd = URL . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['communication']['name'];
    $evaluation_bdd = URL . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['evaluation']['name'];
    $exemple_bdd = URL . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['example']['name'];
    $plan_bdd = URL . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['plan']['name'];
    $support_bdd = URL . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['support']['name'];

    $dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'];
    if(!file_exists($dossier))
    {
        mkdir('FOLDER/' . $_POST['folder'], 0777, true);
    }
    else {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger alert-dismissible fade show text-center" role="alert">
            This archive already exists in database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

    $communication_dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['communication']['name'];
    $evaluation_dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['evaluation']['name'];
    $exemple_dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['example']['name'];
    $plan_dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['plan']['name'];
    $support_dossier = RACINE_SITE . 'FOLDER/' . $_POST['folder'] . '/' . $_FILES['support']['name'];

    if(empty($_FILES['communication']['tmp_name']) || empty($_FILES['evaluation']['tmp_name']) || empty($_FILES['example']['tmp_name']) || empty($_FILES['plan']['tmp_name']) || empty($_FILES['support']['tmp_name']))
    {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger alert-dismissible fade show" role="alert">
        Please fill in all the fields (Max size <strong>100Mo</strong>)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';

    }
    else {
        copy($_FILES['communication']['tmp_name'], $communication_dossier);
        copy($_FILES['evaluation']['tmp_name'], $evaluation_dossier);
        copy($_FILES['example']['tmp_name'], $exemple_dossier);
        copy($_FILES['plan']['tmp_name'], $plan_dossier);
        copy($_FILES['support']['tmp_name'], $support_dossier);
    }

    if(empty($error))
    {   
        $resultat = $pdo->prepare("INSERT INTO archive (folder,color,communication,evaluation,example,plan,support) VALUES (:folder,:color,:communication,:evaluation,:example,:plan,:support)");
        $resultat->bindValue(':folder', $_POST['folder'], PDO::PARAM_STR);
        $resultat->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
        $resultat->bindValue(':communication', $communication_bdd, PDO::PARAM_STR);
        $resultat->bindValue(':evaluation', $evaluation_bdd, PDO::PARAM_STR);
        $resultat->bindValue(':example', $exemple_bdd, PDO::PARAM_STR);
        $resultat->bindValue(':plan', $plan_bdd, PDO::PARAM_STR);
        $resultat->bindValue(':support', $support_bdd, PDO::PARAM_STR);
        $resultat->execute();

        header('location:' . URL .'index.php');
    }

    $content .= $error;
}

require_once 'inc/header.php';
?>

<div class="col-11 col-sm-8 col-md-7 col-lg-5 mx-auto rounded text-white my-3 bg-dark p-2">

    <h1 class="col-md-8 offset-md-2 display-4 text-center text-white mt-4"><i class="fas fa-file-upload"></i><hr class="bg-white"></h1>

    <?= $content; ?>
    <div class="container mon-formulaire">
        <form method="post" action="" enctype="multipart/form-data" class="col-sm-10 col-md-10 mx-auto">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cours">Nom du dossier</label>
                    <input type="text" class="form-control" id="folder" name="folder" placeholder="Saisir le nom du cours">
                </div>
                <div class="form-group col-md-6">
                    <label for="color">couleur du dossier</label>
                    <select id="color" name="color" class="form-control">
                    <option selected>Choose...</option>
                    <option value="primary">Primary</option>
                    <option value="secondary">Secondary</option>
                    <option value="success">Success</option>
                    <option value="danger">Danger</option>
                    <option value="warning">Warning</option>
                    <option value="info">Info</option>
                    <option value="dark">Dark</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="communication">Communication *</label>
                    <input type="file" class="form-control" id="communication" name="communication">
                </div>
                <div class="form-group col-md-6">
                    <label for="evaluation">Evaluation *</label>
                    <input type="file" class="form-control" id="evaluation" name="evaluation">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="example">Exemple *</label>
                    <input type="file" class="form-control" id="example" name="example">
                </div>
                <div class="form-group col-md-6">
                    <label for="plan">Plan *</label>
                    <input type="file" class="form-control" id="plan" name="plan">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="support">Support *</label>
                    <input type="file" class="form-control" id="support" name="support">
                </div>
                <!-- <div class="form-group col-md-5 mt-4 ml-4">
                    p class="text-right mt-2">(* folder ZIP/RAR)</p>
                </div> -->
            </div>
            
            <button type="submit" class="btn btn-secondary mb-4" name="enregistrer">Enregistrer</button>
        </form>
    </div>

</div>
<?php
require_once 'inc/footer.php';