function onloadMax()
{
    $('#bouton_connexion').click(function () {
        $('#menu_conn_box').toggle();
        $('#menu_insc_box').hide();
    });    
    $('#bouton_inscription').click(function () {
        $('#menu_insc_box').toggle();
        $('#menu_conn_box').hide();
    });
    
    $('.bouton_annuler').click(function () {$('.menu_box').hide();});
    $('#bouton_addliste').click(function () {$('#menu_addliste_box').toggle();});
    $('#bouton_invitation').click(function () {$('#menu_inv_box').toggle();});
    $('#bouton_ajout_produit').click(function () {$('#menu_ajout_box').toggle();});
}

function allerALUrl(strUrl)
{
    document.location.href = strUrl;
}

/*Fonction qui check si le produit n'est pas déjà coché en base et le coche*/
function checkAndLineThrough(element)
{
    if($(element).is(":checked"))
        $(element).parents(".liste-produits").addClass("checked");
    else
        $(element).parents(".liste-produits").removeClass("checked");
    $.ajax({url:"http://localhost/smartliste/web/index.php/liste/coche/link/"+$(element).attr("id-link")+"/coche/"+($(element).is(":checked")?"1":"0"),success:function(response){
            if(response != "ok")
            {
                $(element).parents(".liste-produits").removeClass("checked");
                $(element).prop('checked', false);
                alert(response);
            }
    }});
}