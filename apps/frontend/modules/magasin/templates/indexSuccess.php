<div class="presentation">
    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <div id="menu_inv_box" class="menu_box">
                <form method="post" action="<?php echo url_for('magasin/NouveauMagasin') ?>">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value="" /></br>
                    <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value="" /></br>
                    <span>Partage : </span>
                        <input type="radio" id="parmoi" name="partage" value="MOI" checked /><label for="parmoi"><i class="par_moi fa fa-user"></i> Moi</label>
                        <input type="radio" id="parlst" name="partage" value="LST" /><label for="parlst"><i class="par_lst fa fa-list-alt"></i> Liste</label>
                        <input type="radio" id="parsit" name="partage" value="SIT" /><label for="parsit"><i class="par_sit fa fa-globe"></i> Site</label>
                        </br>
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>
                </form>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <form method="post" action="<?php echo url_for('magasin/index'); ?>">
                <?php $tous_aff = 0 ; if(isset($_GET['aff']) && $_GET['aff'] == 'tous' ) { $tous_aff = 1;  ?>
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
    <?php if($tous_aff) { 
              include_partial("magasin/magasin1",array("magasins"=>$magasins));
          }
          else {
              include_partial("magasin/magasin2",array("magasins"=>$magasins));
          } 
      ?>
    </div>
</div>