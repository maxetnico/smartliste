<?php if(isset($liste)) { ?>
    <div class="row ma-no-h">
        <div class="col-xs-12">
            <?php include_partial("liste/liste",array("boolEnDetail" => false,"liste"=>$liste)) ?>
        </div>
    </div>   
<?php } ?>
<div class="presentation">
    <?php if(!isset($liste)) { ?>
        <div id="menu_mag" class="menu_mag row ma-no-h pa-no-h">
            <div class="col-xs-8 col-xs-offset-2 pa-no-h">
                <button id="bouton_ajout_produit" type="button"><i class="fa fa-plus-circle"></i> Ajouter un produit</button>
                <div id="menu_ajout_box" class="menu_box">
                    <!--<form method="post" action="<?php echo url_for('produit/ajouter') ?>">
                        <span>nom : </span><input type="text" name="nommag" placeholder="Nom du magasin" value=""></br>
                        <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value=""></br>
                        <span>Partage : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                        <span>Catégorie : </span><input type="text" name="visiblepar" placeholder="Visible par qui ?" value=""></br>
                        <button type="submit" id="bouton_valider">Ajouter</button>
                        <button type="reset" class="bouton_annuler">Annuler</button>
                    </form>-->
                    <form method="post" action="<?php echo url_for('produit/ajouter') ?>">
                        <span>nom : </span><input type="text" id="nommag" name="nom" placeholder="Nom du produit" value="" /><br>
                        <a id="imgRecherche">Recherche image</a></br>
                        <span>image : </span><input type="text" name="lienimg" placeholder="Lien vers l'image" value="" /><br>
                        <span>Partage : </span>
                            <input type="radio" id="parmoi" name="partage" value="MOI" checked /><label for="parmoi"><i class="par_moi fa fa-user"></i> Moi</label>
                            <input type="radio" id="parlst" name="partage" value="LST" /><label for="parlst"><i class="par_lst fa fa-list-alt"></i> Liste</label>
                            <input type="radio" id="parsit" name="partage" value="SIT" /><label for="parsit"><i class="par_sit fa fa-globe"></i> Site</label>
                            <br>
                        <span>Type : </span>
                            <select name="categorie">
                                <?php
                                foreach ($categories as $modelCategorie)
                                {
                                    echo "<option value='".$modelCategorie->getId()."'>".$modelCategorie->getNom()."</option>";
                                }
                                ?>
                            </select>
                        <br>
                        <button type="submit" id="bouton_valider">Ajouter</button>
                        <button type="reset" class="bouton_annuler">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row ma-no-h text-center recherche-produit">
        <span>Recherche : </span><input type="text" id="recherche-produit" onkeyup="rechercheDansLesProduits()"><div class="recherche-produit-search"><i class="fa fa-search"></i></div>
    </div>
    <div class="row ma-no-h pa-no-h">
        <div id="mag_perso" class="mes_mag block col-sm-8 col-sm-offset-2 col-xs-12">
            <h3>Produits</h3>
            <?php if(isset($liste)) { ?>
            <form method="POST" action="<?php echo url_for("produit/ajout") ?>">
                <input type="hidden" name="liste" value="<?php echo $liste->getId() ?>">
            <?php } ?>
                <table class="mag table-hover mag style_police table">
                    <thead>
                        <tr>
                            <th class="tleft">Etat</th>
                            <th>Catégorie</th>
                            <th>Nom</th>
                            <th></th>
                            <th class="text-center-important">Partage</th>
                            <?php if(isset($liste)) { ?><th class="tright">Quantité</th><?php } else { ?><th class="tright text-center-important"></th> <?php } ?>
                        </tr>
                    </thead>
                    <?php                
                    foreach ($produits as $cle => $produit) { ?>
                    <tr class="produit-ligne" data-text="<?php echo strtoupper($produit->getCategorieNom().' '.$produit->getNom()); ?>">
                            <td width='37px'>
                                <?php echo $produit->getEtatNom()=="VAL"?"<i class='etat_val fa fa-check-circle'></i>":($produit->getEtatNom()=="ATT"?"<i class='etat_att fa fa-clock-o'></i>":"<i class='etat_ref fa fa-times-circle'></i>"); ?>
                            </td>
                            <td>
                                <?php echo $produit->getCategorieNom(); ?>
                            </td>
                            <td class="image">
                            <?php echo image_tag($produit->getImg(),array()); ?>
                            </td>
                            <td>  
                            <?php echo $produit->getNom(); ?>
                            </td>
                            <td class="text-center">
                            <?php echo $produit->getVisibleCode()=="MOI"?'<i class="par_moi fa fa-user"></i>':($produit->getVisibleCode()=="LST"?'<i class="par_lst fa fa-list-alt"></i>':'<i class="par_sit fa fa-globe"></i>'); ?>
                            </td>
                            <?php if(isset($liste)) { ?>
                            <td>                                
                                <input type="number" name="<?php echo $produit->getId() ?>" value="0" class="width-60 produit-number">                               
                            </td>
                            <?php }
                            else{ ?> 
                            <td>
                                <?php if($arrProduitsSupprimable[$cle]) { ?>
                                    <a href="<?php echo url_for("produit/supprimer").'/produit/'.$produit->getId(); ?>" title='Supprimer'><i class='fa fa-trash'></i></a>
                                 <?php } ?>
                            </td>    
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
                 <?php if(isset($liste)) { ?>
                <button class="right" type="submit">Ajouter à la liste</button>
            </form>
            <?php } ?>
        </div>
    </div>
</div>