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