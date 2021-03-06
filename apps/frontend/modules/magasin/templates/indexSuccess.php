<div class="presentation">
    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <div id="menu_inv_box" class="menu_box">
                <form method="post" action="<?php echo url_for('magasin/NouveauMagasin') ?>">
                    <span>nom : </span><input type="text" id="nommag" name="nommag" placeholder="Nom du magasin" value="" /></br>
                    <a id="imgRecherche">Recherche image</a></br>
                    <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value="" /></br>
                    <span>Partage : </span>
                        <p nowrap><input type="radio" id="parmoi" name="partage" value="1" checked /><label for="parmoi"><i class="par_moi fa fa-user"></i>&nbsp;Moi</label>
                        <input type="radio" id="parlst" name="partage" value="2" /><label for="parlst"><i class="par_lst fa fa-list-alt"></i>&nbsp;Liste</label>
                        <input type="radio" id="parsit" name="partage" value="3" /><label for="parsit"><i class="par_sit fa fa-globe"></i>&nbsp;Site</label></p>
                        </br>
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>
                </form>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <form method="get" action="<?php echo url_for('magasin/index'); ?>">
                <?php if(isset($_GET['aff']) && $_GET['aff'] == 'tous' ) {   ?>
                <input name="aff" type="hidden" value="mes">
                <button id="bouton_invitation" type="submit" value="mes">Mes magasins</button>
                <?php }else { ?>
                <input name="aff" type="hidden" value="tous">
                <button id="bouton_invitation" type="submit" value="tous">Tous les magasins</button>
                <?php  } ?>
            </form>
        </div>
    </div>
    <div class="row ma-no-h pa-no-h">
    <?php 
          if(isset($_GET['aff']) && $_GET['aff'] == 'tous' ) { 
              include_partial("magasin/magasin1",array("magasins"=>$magasins));
          }
          else {
              include_partial("magasin/magasin2",array("magasins"=>$magasins,"magasinsfav"=>$magasinsfav));
          } 
      ?>
    </div>
</div>