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
}