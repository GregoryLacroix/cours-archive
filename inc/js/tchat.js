var url = "tchatAjax.php";
var lastid = 0;
var timer = setInterval(getMessage,1000);
var ctimer = setInterval(getConnected,1000);
//------------- BOUTON SUBMIT ----------------------//
$(function(){
    getConnected();
    $("#tchatForm form").submit(function(){
        clearInterval(timer);
        showLoader("#load");
        var message = $("#message").val();
        //console.log(message);
        
        $.post(url,{action:"addMessage", message:message}, function(data){
            if(data.erreur == 'ok')
            {
                getMessage();
                $("#message").val("");
            }
            else
            {
                alert(data.erreur);
            }
            timer = setInterval(getMessage,1000);
            hideLoader();
        }, "json"); 
        return false; // permet d'annuler le comportement du bouton submit, qui a pour role de recharger la page et donc le code
    })
});

//------------- AFFICHAGE MESSAGE ------------------//
function getMessage(){
    $.post(url,{action:"getMessage", lastid:lastid}, function(data){
        if(data.erreur == 'ok')
        {
            $("#tchat").append(data.result);
            lastid = data.lastid;
            $('#tchat').scrollTop($('#tchat')[0].scrollHeight);
        }
        hideLoader();
    }, "json"); 
}

function getConnected(){
    $.post(url,{action:"getConnected"},function(data){
            if(data.erreur=="ok"){
                $("#connected").empty().append(data.result);
            }
            else{
                // alert(data.erreur);
            }
        },"json");
        return false;
}

// //------------- AFFICHAGE DU LOADER ---------------//
function showLoader(div){
    $(div).append('<div class="loader"></div>');
    $(".loader").fadeTo(400,0.6);
}

//------------ CACHER LE LOADER ------------------//
function hideLoader(){
    $(".loader").fadeOut(200, function(){
        $(".loader").remove();
    });
}

// scroll vertical vers le bas
var x = document.getElementById('tchat');
x.scrollTop = x.scrollHeight;




