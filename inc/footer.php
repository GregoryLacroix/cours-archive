</section>

    <footer class="bg-dark text-center p-4">
        
        &copy; 2020 <span class="text-info">GL</span> - Tous droits réservés - 
       
        <a href="#" class="text-white" data-toggle="modal" data-target=".bd-example-modal-lg">Mentions légales</a> - 
        <a href="#" class="text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Contact</a>

        <?php require_once("modal.php"); ?>
      
    </footer> 
    <div class="loader"></div>
    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="inc/js/archive.js"></script> -->

    <script src="<?= URL ?>inc/js/tchat.js"></script>

    <script>

    $(document).ready(function(){ 
        $("#send").click(function(event){
            //alert('test');
            event.preventDefault(); 
            ajaxEnvoiForm(); 
        });

        function ajaxEnvoiForm()
        {	
            var expediteur = $('#expediteur').val(); 	
            console.info(expediteur);

            var object = $('#object').val(); 	
            console.info(object);

            var messageContact = $('#messageContact').val(); 	
            console.info(messageContact);

            var parameters = "expediteur="+expediteur+"&object="+object+"&messageContact="+messageContact;
            console.info(parameters);

            // https://cours-archive.fr/inc/AjaxContact.php

            $.post("https://g-lacroix.cours-archive.fr/inc/AjaxContact.php", parameters, function(data){
                   
                $('#message-form').html(data.msg); 
                // $('#form1').[0].reset();
                $('#expediteur').val(''); 
                $('#object').val(''); 
                $('#messageContact').val(''); 
            }, 'json');
        }		

    });

    $(window).on("load", function(){
        //alert('Le chargement de la page web est terminé');
        $(".loader").fadeOut("10000");
        // alert('window chargé');
    });
    </script>

    
</body>
</html>