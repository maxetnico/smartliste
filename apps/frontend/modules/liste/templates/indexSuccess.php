<div class="row ma-no-h">
    <div class="col-md-offset-2 col-md-10 col-xs-12">
        <button type="button" id="bouton_addliste"><span class="fa fa-plus"></span> Ajouter une liste</button>
        <div id="menu_addliste_box" class="menu_box ma-no-v text-left-important">
            <form method="post" action="<?php echo url_for('liste/add') ?>">
                <div class="row ma-no-h">
                    <span>Nom :</span>
                    <input type="text" class="" name="nom" placeholder="Nom de la liste">
                </div>    
                <div class="row ma-no-h">
                    <span>Couleur :</span>
                    <select name="couleur" class="colorpicker">
                        <option value="#7bd148">Vert</option>
                        <option value="#5484ed">Bleu foncé</option>
                        <option value="#a4bdfc">Bleu</option>
                        <option value="#46d6db">Turquoise</option>
                        <option value="#7ae7bf">Vert clair</option>
                        <option value="#51b749">Vert foncé</option>
                        <option value="#fbd75b">Jaune</option>
                        <option value="#ffb878">Orange</option>
                        <option value="#ff887c">Rouge</option>
                        <option value="#dc2127">Rouge foncé</option>
                        <option value="#dbadff">Violet</option>
                        <option value="#e1e1e1">Gris</option>
                    </select>
                </div>
                <div class="row ma-no-h">
                    <span class="">Icone :</span>
                    <?php $arr = ["fa fa-home", "fa fa-beer", "fa fa-ambulance","fa fa-film", "fa fa-music", "fa fa-plane", "fa fa-users", "fa fa-suitcase", "fa fa-money"];
                        foreach ($arr as $key => $value) { ?>
                        <input type="radio" <?php echo $key==0?"checked":"" ?> name="icone" value="<?php echo $value ?>" id="<?php echo $value ?>">
                        <label class="<?php echo $value ?>" for="<?php echo $value ?>"></label>
                        <?php }
                        ?>                
                </div>
                <div class="row ma-no-h text-center-important">
                    <button class="" type="submit" id="bouton_valider">Créer</button>      
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row ma-no-h">
    <div class="col-xs-12">
        <?php
        foreach ($listes as $liste) {
            include_partial("liste/liste",array("boolEnDetail" => false, "liste"=>$liste));
        }
        ?>
    </div>
</div>

