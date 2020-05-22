<!-- DEBUT MENTIONS LEGALES -->

        <div class="modal fade bd-example-modal-lg modal-index" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-index">
                <div class="modal-content text-dark p-4 border border-info text-left text-justify" id="modal-ml">
                    <?php require_once("inc/legalNotice.php"); ?>
                </div>
            </div>
        </div>

        <!-- FIN MENTIONS LEGALES -->

        <!-- DEBUT MODAL CONTACT -->

        <div class="modal fade text-dark modal-index" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-index" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="message-form">
                
            </div>
                <form method="post" action="" name="form1">
                <div class="form-group">
                    <label for="expediteur" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="expediteur" name="expediteur">
                </div>
                <div class="form-group">
                    <label for="object" class="col-form-label">Objet:</label>
                    <input type="text" class="form-control" id="object" name="object">
                </div>
                <div class="form-group">
                    <label for="message" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="messageContact" name="messageContact" rows="7"></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" name="send" id="send" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- FIN MODAL CONTACT -->