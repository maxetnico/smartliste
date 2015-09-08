<?php
// /!\ $produits contient le nom des catégories en clé et un tableau avec [0] le produit et [1] le magasin
?>
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
<div class="row ma-no-h listes-produits">
    <?php
    //var_dump($produits);
    if(count($produits) != 0)
    {
        foreach ($produits as $strCategorie => $arrProduits)
        { ?>
    <div class="col-md-6 col-sm-12">
        <table class="conteneur">
            <tr><th class="categorie" colspan="5"><?php echo $strCategorie ?></th></tr>            
                <?php foreach ($arrProduits as $key => $arr)
                {                     
                    $modelProduit = $arr[0];
                    $modelMagasin = $arr[1];
                    $modelListeProduitLink = $arr[2];
                    ?>            
                <tr class="liste-produits">
                    <td class="vignette">
                        <?php echo image_tag($modelProduit->getImg()) ?>
                    </td>
                    <td class="texte">
                        <span class="nom-produit"><?php echo $modelProduit->getNom() ?></span>
                    </td>
                    <td class="quantite">
                        <span class="nom-produit">Nb: <?php echo $modelListeProduitLink->getQuantite() ?></span>
                    </td>
                    <td class="magasin">
                        <select class="select-image" id-link="<?php echo $modelListeProduitLink->getId() ?>" onchange="changeSelectImage(this)">
                        <?php foreach ($magasins as $key => $magasin) { ?>
                           <option style="background:url('images/magasins/<?php echo $magasin->getImg() ?>') no-repeat; background-size: 100% auto;" title="<?php echo $magasin->getNom() ?>" value="<?php echo $magasin->getId(); ?>" <?php echo (($modelListeProduitLink->getIdMagasin() == null && $key == 0 )|| ($magasin->getId()==$modelListeProduitLink->getIdMagasin()))?"selected":""; ?>></option>
                        <?php } ?>                 
                        </select>
                        <?php 
                        /*if($modelMagasin != null)
                        {
                            echo $modelMagasin->getImg()!=null?image_tag($modelMagasin->getImg()):'';
                        }*/ ?>
                    </td>
                    <td class="checkbox">
                        <input type="checkbox" id-link="<?php echo $modelListeProduitLink->getId() ?>" name="cb-link-<?php echo $modelListeProduitLink->getId() ?>" onclick="checkAndLineThrough(this)">
                    </td>
                </tr>
                <?php } ?>           
        </table>  
    </div>
    <?php } 
    }
    else
    {
    ?>
    <h2>Cette liste ne contient aucun produit</h2>
    <?php } ?>
</div>
