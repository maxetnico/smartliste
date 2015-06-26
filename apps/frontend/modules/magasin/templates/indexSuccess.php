
<div class="row ma-no-h">
    <div class="col-md-offset-2 col-md-4 col-xs-12">
        <button id="bouton_invitation" class=""><i class="fa fa-plus-circle"></i> Ajouter un magasin</button>
    </div>
    <div id="menu_inv_box" class="menu_box">     
        <span>Ajout d'un magasin</span><br>
        nom : <input type="text" name="nommag" placeholder="Nom du magasin" value="">
        image : <input type="text" name="lienimg" placeholder="Lien vers l'image" value="">
        Partage : <input type="text" name="nommag" placeholder="Visible par qui ?" value="">
        <button id="ajout_mag" type="submit">Ajout</button>
        <button id="annuler_mag" type="reset">Annuler</button>
    </div>
</div>
<div class="row ma-no-h">
    Mes Magasins
    <ul class="col-xs-12">
        
        <?php
        foreach ($magasins as $magasin) {
            include_partial("magasin/magasin",array("magasin"=>$magasin));
        }
        ?>
    </ul>
</div>