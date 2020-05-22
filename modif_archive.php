<?php
require_once 'inc/init.php';

if(!internauteEstConnecte())
{
	header("location:" . URL . "connexion.php");
}

if(isset($_SESSION['student']))
{
    header("location:" . URL . "connexion.php");
}

foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
}

//--------------------------------- SUPPRESSION -------------------------------------
if(isset($_GET['action']) && $_GET['action'] == 'supp')
{
    $resultat = $pdo->prepare("SELECT cours FROM archive WHERE idArchive = :id");
    $resultat->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $resultat->execute();

    $data = $resultat->fetch(PDO::FETCH_ASSOC); 
    //debug($data);

    $resultat = $pdo->prepare("DELETE FROM archive WHERE idArchive = :idArchive");
    $resultat->bindValue(':idArchive', $_GET['id'], PDO::PARAM_INT);
    $resultat->execute();

    $dir = 'COURS/' . $data['cours'];

    //echo $dir;
    rrmdir($dir).

    $content .= '<div class="col-md-4 offset-md-4 alert alert-success alert-dismissible fade show text-center" role="alert">
                    L\'archive <strong>' . $data['cours'] . '</strong> a bien été supprimée!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

}

//--------------------------------- MODIFICATION -------------------------------------
if(isset($_GET['action']) && $_GET['action'] == 'modif')
{
    
}
//------------------------------------------------------------------------------------

require_once 'inc/header.php';
?>

<div class="col-md-10 mx-auto rounded text-white m-3 fond text-dark p-2">

    <h1 class="col-md-4 offset-md-4 display-4 text-center mt-4"><i class="fas fa-exchange-alt"></i></h1><hr>

    <?php
    echo $content;

    //---------------------------- AFFICHAGE ARCHIVE ------------------------------------
    $resultat = $pdo->query("SELECT * FROM archive");
    ?>

    <h4 class="text-center my-3"><span class="badge badge-info"><?= $resultat->rowCount(); ?></span> <?php if($resultat->rowCount() > 1) {echo 'archived files';} else {echo 'archived file';} ?></h4>

    <?php if($resultat->rowCount() > 0): ?>
    <div class="table-responsive">
    <table class="table text-center mb-4"><tr>
    <?php 
    for($i = 0; $i < $resultat->columnCount(); $i++) 
    {
        $colonne = $resultat->getColumnMeta($i);
        if($colonne['name'] != 'idArchive')
            echo "<th>" . ucfirst($colonne['name']) . "</th>";
    } 
    ?>
        <th>Edit</th>
        <th>Remove</th></tr>
    <?php 
    while($archive = $resultat->fetch(PDO::FETCH_ASSOC)): 
        //debug($archive);
        echo '<tr class="table-archive">';
        foreach($archive as $key => $value):
            if($key != 'idArchive'):
                if($key != 'folder' && $key != 'color')
                {
                    echo "<td class='cours'><a href='" . $value . "' class='text-dark' title='" . $value . "'><i class='far fa-file-archive icone-modif'></i></a></td>";
                }
                else {
                    echo "<td class='cours'>" . strtoupper($value) . "</td>";
                }
            endif;
        endforeach;
        echo "<td><a href='" . URL . "modif_archive.php?action=modif&id=" . $archive['idArchive'] . "' class='text-info'><i class='fas fa-edit icone-modif'></i></a></td>";
        //echo '<td><a href="' . URL . 'modif_archive.php?action=supp&id=' . $archive['idArchive'] . '" class="text-danger archive-alert" onclick="return(confirm(\'Validate archive remove ?\'));"><i class="fas fa-trash-alt icone-modif"></i></a></td>';
        echo '<td><a href="' . URL . 'modif_archive.php?action=supp&id=' . $archive['idArchive'] . '" class="text-danger archive-alert" data-toggle="modal" data-target="#' . $archive['folder'] . '"><i class="fas fa-trash-alt icone-modif"></i></a></td>';

        echo '<div class="modal fade" id="' . $archive['folder'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archive deletion <strong class="text-info">' . $archive['folder'] . '</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the archive : <strong class="text-info">' . $archive['folder'] . '</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>';
        echo '</tr>';
    endwhile; ?>
    </table>
    </div>

</div>
<?php else: ?>

    <div class="text-dark text-center"><strong>No archive! You can add some by clicking <a href="<?= URL ?>ajout.php" class="alert-link text-info"> here</a></strong></div>

<?php endif; 
//-----------------------------------------------------------------------------------


if(isset($_GET['action']) && $_GET['action'] == 'modif'):

    if(isset($_GET['id']))
    {
        $result = $pdo->prepare("SELECT * FROM archive WHERE idArchive  = :id");
        $result->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        //debug($data);

        $idArchive = (isset($data['idArchive'])) ? $data['idArchive'] : '';
        $folder = (isset($data['folder'])) ? $data['folder'] : '';
        $color = (isset($data['color'])) ? $data['color'] : '';
        $communication = (isset($data['communication'])) ? $data['communication'] : '';
        $evaluation = (isset($data['evaluation'])) ? $data['evaluation'] : '';
        $example = (isset($data['example'])) ? $data['example'] : '';
        $plan = (isset($data['plan'])) ? $data['plan'] : '';
        $support = (isset($data['support'])) ? $data['support'] : '';
    }
?>

<div class="col-11 col-sm-8 col-md-6 rounded mx-auto m-3 fond p-2">

    <div class="container mon-formulaire">
        <form method="post" action="" enctype="multipart/form-data" class="">
        <input type="hidden" id="idArchive" name="idArchive" value="<?= $idArchive ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="folder">Folder name</label>
                    <input type="text" class="form-control" id="folder" name="folder" placeholder="Saisir le nom du cours" value="<?= $folder ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="color">Folder color</label>
                    <select id="color" name="color" class="form-control">
                    <option selected>Choose...</option>
                    <option value="primary" <?php if($color == 'primary') echo 'selected' ?>>Primary</option>
                    <option value="secondary" <?php if($color == 'secondary') echo 'selected' ?>>Secondary</option>
                    <option value="success" <?php if($color == 'success') echo 'selected' ?>>Success</option>
                    <option value="danger" <?php if($color == 'danger') echo 'selected' ?>>Danger</option>
                    <option value="warning" <?php if($color == 'warning') echo 'selected' ?>>Warning</option>
                    <option value="info" <?php if($color == 'info') echo 'selected' ?>>Info</option>
                    <option value="dark" <?php if($color == 'dark') echo 'selected' ?>>Dark</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="communication">Communication *</label>
                    <input type="hidden" id="comm_actuelle" name="comm_actuelle" value="<?= $communication ?>">
                    <input type="file" class="form-control" id="communication" name="communication">
                    <?php 
                    $data = explode("/",$communication); 
                    //debug($data);
                    ?>
                    <p class="text-info">Folder BDD : <?= $data[5] ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="evaluation">Evaluation *</label>
                    <input type="hidden" id="eval_actuelle" name="eval_actuelle" value="<?= $evaluation ?>">
                    <input type="file" class="form-control" id="evaluation" name="evaluation">
                    <?php 
                    $data = explode("/",$evaluation); 
                    //debug($data);
                    ?>
                    <p class="text-info">Folder BDD : <?= $data[5] ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="example">Exemple *</label>
                    <input type="hidden" id="ex_actuelle" name="ex_actuelle" value="<?= $example ?>">
                    <input type="file" class="form-control" id="example" name="example">
                    <?php 
                    $data = explode("/",$example); 
                    //debug($data);
                    ?>
                    <p class="text-info">Folder BDD : <?= $data[5] ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="plan">Plan *</label>
                    <input type="hidden" id="plan_actuelle" name="plan_actuelle" value="<?= $plan ?>">
                    <input type="file" class="form-control" id="plan" name="plan">
                    <?php 
                    $data = explode("/",$plan); 
                    //debug($data);
                    ?>
                    <p class="text-info">Folder BDD : <?= $data[5] ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="support">Support *</label>
                    <input type="hidden" id="sup_actuelle" name="sup_actuelle" value="<?= $support ?>">
                    <input type="file" class="form-control" id="support" name="support">
                    <?php 
                    $data = explode("/",$support); 
                    //debug($data);
                    ?>
                    <p class="text-info">Folder BDD : <?= $data[5] ?></p>
                </div>
                <!-- <div class="form-group col-md-5 mt-4 ml-4">
                    <p class="text-right mt-2">(* dossier ZIP/RAR)</p>
                </div> -->
            </div>
            
            <button type="submit" class="btn btn-info mb-4" name="enregistrer">Record</button>
        </form>
    </div>

</div>

<?php
endif;
require_once 'inc/footer.php';