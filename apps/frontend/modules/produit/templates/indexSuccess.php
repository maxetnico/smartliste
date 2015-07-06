<?php if(isset($liste)) { ?>
    <div class="row ma-no-h">
        <div class="col-xs-12">
            <?php include_partial("liste/liste",array("boolEnDetail" => false,"liste"=>$liste)) ?>
        </div>
    </div>   
<?php } ?>
<div class="presentation">
    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
        <div class="col-xs-8 col-xs-offset-2 pa-no-h">
            <button id="bouton_ajout" type="button"><i class="fa fa-plus-circle"></i> Ajouter un produit</button>
            <div id="menu_ajout_box" class="menu_box">
                <form method="post" action="<?php echo url_for('produit/ajouter') ?>">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value=""></br>
                    <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value=""></br>
                    <span>Partage : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                    <span>Catégorie : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row ma-no-h pa-no-h">
        <div id="mag_perso" class="mes_mag block col-xs-8 col-xs-offset-2">
            <h4>Produits</h4>
            
            <table class="table table-hover">
                    <tr>
                        <th>Catégorie</th>
                        <th>Nom</th>
                        <th>Partage</th>
                    </tr>
                <?php
                var_dump($produits);
                foreach ($produits as $produit) { ?>
                    <tr>
                        <td width='37px'>
                            <?php echo $magasin->getEtatNom()=="VAL"?"<i class='mag_val fa fa-check-circle'></i>":($magasin->getEtatNom()=="ATT"?"<i class='mag_att fa fa-clock-o'></i>":"<i class='mag_ref fa fa-times-circle'></i>"); ?>
                        </td>
                        <td>
                        <?php echo image_tag('magasins/'.$magasin->getImg(),array("width"=>"35px")); 
                              echo $magasin->getNom(); ?>
                        </td>
                        <td>
                        <?php echo $magasin->getVisibleNom(); ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>