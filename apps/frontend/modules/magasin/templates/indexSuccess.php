<script type="text/javascript">
  /*$(".js-ajax-php-json").submit(function(){
      alert("envoi");
      var data = {"action": "test3","mag":{"a":"rep1","b":"rep2"},"mag2":["rep3","rep4"],"mag3":"<?php echo json_encode($magasins); ?>"}}
    $.ajax({
      type: "post",
      url: "<?php //echo url_for1('magasin/mag') ?>", //Relative or absolute path to response.php file
      data: data,
      success: function(data) {
        $(".info_mag").html(
          "<li>" + data +"</li>"
        );
        alert('chargé');
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
    return false;
  });*/
  
  $(document).ready(function(){
      
    $('#test2').on("click",function(key)
    {
        $('#loader').show();
        $('#info_mag').load(
       // $.ajax(
        {
            type: "GET",
            url: $('#formajax').attr('action'),
            data: { query: this.value + '*' },
            dataType: 'html',
            success:function() { $('#loader').hide(); },
            error:function() { alert('erreur');$('#loader').hide(); }
                    
        );
    });
  });
</script>


<div class="presentation">
    <div id="menu_mag" class="search menu_mag row ma-no-h pa-no-h">
<!--    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
                <form method="post" action="<?php //echo url_for('magasin/mag') ?>" class="js-ajax-php-json" accept-charset="utf-8">-->
        <form id="formajax" method="get" action="<?php //echo url_for('magasin/search') ?>">
        <div class="col-xs-8 col-xs-offset-2 pa-no-h">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <button type="submit" id="test">test1</button>
            <button value="search" id="test2">test2</button>
           
            <?php echo image_tag('loading4.gif',array("id"=>"loader","width"=>"20px","style"=>"display:none")); ?>
           <!-- <img id="loader" src="/legacy/images/loader.gif" style="vertical-align: middle; display: none" /> -->
            <div id="menu_inv_box" class="menu_box">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value="cora"></br>
                 <!--   <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value=""></br>
                    <span>Partage : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                    
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>-->
            </div>
        </div>
        <div id="info_mag" name="info_mag" class="info_mag block col-xs-12">
hello
        </div>
                </form>
    </div>
        <?php 
               /* foreach ($magasins as $magasin) {
                    echo $magasin->getNom();
                }
                var_dump($magasins);*/
        ?>
    <div class="row ma-no-h pa-no-h">

        <div id="mag_perso" class="mes_mag  col-xs-5 col-xs-offset-2">
            <h4>Mes Magasins</h4>
            <ul class="info_mag block col-xs-12">
                <?php
                foreach ($magasins as $magasin) {
                    include_partial("magasin/magasin",array("magasin"=>$magasin));
                }
                ?>
            </ul>
        </div>
        <div id="mag_en_validation" class="mag_en_validation col-xs-3">
            <h4>Mes Magasins en cours de validation</h4>
            <ul class="block col-xs-12">

                <?php
                foreach ($magasins as $magasin) {
                    include_partial("magasin/magasin",array("magasin"=>$magasin));
                }
                ?>
            </ul>
        </div>
    </div>
</div>
