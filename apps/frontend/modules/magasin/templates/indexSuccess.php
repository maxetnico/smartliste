<div class="presentation">
    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <div id="menu_inv_box" class="menu_box">
                <form method="post" action="<?php echo url_for('magasin/ajouter') ?>">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value="" /></br>
                    <span>image : </span><input type="file" name="lienimg" placeholder="Lien vers l'image" value="" /></br>
                    <span>Partage : </span>
                        <input type="radio" id="parmoi" name="partage" value="MOI" checked /><label for="parmoi"><i class="par_moi fa fa-user"></i> Moi</label>
                        <input type="radio" id="parlst" name="partage" value="MOI" /><label for="parlst"><i class="par_lst fa fa-list-alt"></i> Liste</label>
                        <input type="radio" id="parsit" name="partage" value="MOI" /><label for="parsit"><i class="par_sit fa fa-globe"></i> Site</label>
                        </br>
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>
                </form>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <form method="get" action="<?php echo url_for('magasin/index'); ?>">
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
        <div id="mag_perso" class="mes_mag block col-sm-8 col-sm-offset-2 col-xs-12">
              <?php if($tous_aff) { ?>
            <h3>Tous les magasins</h3>
              <?php } else { ?>
            <h3>Mes magasins</h3>
              <?php } ?>
            <table align="left" class="mag style_police table">
                <thead>
                    <tr>
                        <th class="tleft col-xs-1">Etat</th>
                        <th class="col-xs-1">Nom</th>
                        <th class="col-xs-8"></th>
                        <th class="col-xs-1">Partage</th>
                        <th class="tright col-xs-1"></th>
                    </tr>
                </thead>
                <?php
                foreach ($magasins as $magasin) {
                    echo '<tr class="quitter">';
                    //include_partial("magasin/magasin1",array("magasin"=>$magasin));
                    
                    echo "<td>";
                    echo $magasin->getEtatNom()=="VAL"?"<i class='etat_val fa fa-check-circle'></i>":($magasin->getEtatNom()=="ATT"?"<i class='etat_att fa fa-clock-o'></i>":"<i class='etat_ref fa fa-times-circle'></i>");
                    echo "</td><td>";
                    echo image_tag('magasins/'.$magasin->getImg(),array("width"=>"35px"));
                    echo "</td><td>";
                    echo $magasin->getNom();
                    echo "</td><td>";
                    echo $magasin->getVisibleNom()=="MOI"?'<i class="par_moi fa fa-user"></i>':($magasin->getVisibleNom()=="LST"?'<i class="par_lst fa fa-list-alt"></i>':'<i class="par_sit fa fa-globe"></i>');
                    echo "</td><td>";
                    if(!$tous_aff)
                        echo "<a href='".(url_for("magasin/quitter").'/magasin/'.$magasin->getId())."' title='Quitter'><i class='quitter fa fa-share-square-o'></i></a>";
                    echo "</td>";
                    
                    
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>