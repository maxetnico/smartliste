<div class="row ma-no-h">
    <div class="col-md-offset-2 col-md-4 col-xs-12">
        <a class="button" href="<?php echo url_for("liste/index") ?>"><i class="fa fa-reply"></i> Retour aux listes</a>
    </div>
    <div class="col-md-offset-2 col-md-4 col-xs-12">
        <button id="bouton_invitation" class=""><i class="fa fa-plus-circle"></i> Inviter quelqu'un</button>
        <div id="menu_inv_box" class="menu_box">           
                <label>Voici le lien d'invitation :</label><br>
                <input type="text" readonly="true" name="lien" value="<?php echo url_for("accueil/invitation",true)."/ticket/".$liste->getIdPartage() ?>" >
        </div>
    </div>
</div>
<div class="liste_details">
    <div class="row ma-no-h">
        <div class="col-xs-12">
            <?php include_partial("liste/liste",array("boolEnDetail" => true,"liste"=>$liste)) ?>
        </div>
    </div>    
</div>
<div class="row ma-no-h">
    <div class="col-md-offset-2 col-md-10 col-xs-12">
        <a class="button" href="<?php echo url_for("produit/index")."/index/liste/".$liste->getId() ?>"><i class="fa fa-plus-square"></i> Ajouter un produit</a>
        <!-- <button id="bouton_ajout_produit" class=""><i class="fa fa-plus-square"></i> Ajouter un produit</button> -->
        <div id="menu_ajout_box" class="menu_box">     
            <div class="row ma-no-h">
                <label>Recherche : </label>
                <input type="text" id="produit_recherche" placeholder="produit">
                <button class="" onclick="rechercherProduit()">Go</button>      
            </div>
            <div class="row ma-no-h" id="produits">
                <?php echo include_component("produit", "produitPagination", array("liste" => $liste)) ?>
            </div>
        </div>
    </div>           
</div>
