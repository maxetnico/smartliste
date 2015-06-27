<div class="presentation">
    <div class="row ma-no-h ma-no-v pa-no-h pa-no-v">
        <div class="col-xs-8 col-xs-offset-2 pa-no-h pa-no-v">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <div id="menu_inv_box" class="menu_box">
                <form method="post" action="<?php echo url_for('magasin/ajouter') ?>">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value=""></br>
                    <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value=""></br>
                    <span>Partage : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                    <button type="submit" id="bouton_valider">Ajouter</button>
                    <button type="reset" class="bouton_annuler">Annuler</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row ma-no-h ma-no-v pa-no-h pa-no-v">
        Mes Magasins
        <ul class="col-xs-12">

            <?php
            foreach ($magasins as $magasin) {
                include_partial("magasin/magasin",array("magasin"=>$magasin));
            }
            ?>
        </ul>
    </div>
</div>