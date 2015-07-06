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