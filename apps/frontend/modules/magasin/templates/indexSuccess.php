<div class="presentation">
    <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
        <div class="col-xs-8 col-xs-offset-2 pa-no-h">
            <button id="bouton_invitation" type="button"><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
            <div id="menu_inv_box" class="menu_box">
                <form method="post" action="<?php echo url_for('magasin/ajouter') ?>">
                    <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value=""></br>
                    <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value=""></br>
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
    </div>
    <div class="row ma-no-h pa-no-h">
        <div id="mag_perso" class="mes_mag col-xs-8 col-xs-offset-2">
            <h3>Mes Magasins</h3>
            
            <table class="mag entete">
                    <tr>
                        <th width='37px'>Etat</th>
                        <th width='37px'>Nom</th>
                        <th></th>
                        <th width='37px'>Partage</th>
                        <th width='37px'>Actions</th>
                    </tr>
                <?php
                foreach ($magasins as $magasin) {
                    echo '<tr>';
                    include_partial("magasin/magasin1",array("magasin"=>$magasin));
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>