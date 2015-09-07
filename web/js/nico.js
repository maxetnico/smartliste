$(document).ready(function () {
    
   onloadMax();    
   
   $('#imgRecherche').css('cursor','pointer');
    $('#nommag').on('change',function(){
        if($('#nommag').val().length > 0 && $('#nommag').val() != " ")
        {
           // $('#imgRecherche').prop('href','https://duckduckgo.com/?q=i!magasin+'+$('#nommag').val());
            $('#imgRecherche').prop('href','https://duckduckgo.com/?q=i!+magasin+'+$('#nommag').val()+'&iax=1&ia=images');
            $('#imgRecherche').prop('target','_blank');
            //$('#imgRecherche').click();
        }  
    });
});