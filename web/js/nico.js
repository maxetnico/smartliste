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
    
//    $('.magclick').on('click',function(){
//        $(this+' input:checkbox').prop('checked',true); //value == 1);
//    });
    $('.magclick').on('click',function(){
        val = '#'+$(this).prop('id')+' td :checkbox';
        $(val).prop('checked',!$(val).prop('checked'));
    });
});