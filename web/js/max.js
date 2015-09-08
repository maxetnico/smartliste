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
    
    $(".select-image").each(function(index,element){
        $(element).attr("style",$(element).find("option:selected").attr("style"));
    });    
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
    $.ajax({url:"liste/coche/link/"+$(element).attr("id-link")+"/coche/"+($(element).is(":checked")?"1":"0"),success:function(response){
            if(response != "ok")
            {
                $(element).parents(".liste-produits").removeClass("checked");
                $(element).prop('checked', false);
                alert(response);
            }
    }});
}

function changeSelectImage(element)
{
    $(element).attr("style",$(element).find("option:selected").attr("style"));
     $.ajax({url:"liste/magasin/link/"+$(element).attr("id-link")+"/magasin/"+$(element).val()});
}

function rechercheDansLesProduits()
{
    var texteAChercher = $('#recherche-produit').val().toUpperCase();
    $(".produit-ligne").each(function(index,element){
       var $element = $(element);
       if($element.attr('data-text').indexOf(texteAChercher) > -1 || $element.find(".produit-number").val() > 0)
       {
           $element.show();
       }
       else
       {
           $element.hide();
       }
    });
}