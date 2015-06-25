<div class="col-xs-12">
    <button type="button" id="bouton_addliste"><span class="fa fa-plus"></span> Ajouter une liste</button>
    <div id="menu_addliste_box" class="menu_box ma-no-v">
        <form method="post" action="<?php echo url_for('liste/add') ?>">
            <input type="text" class="block" name="nom" placeholder="Nom de la liste">
            <label>Couleur :</label>
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
            
            <label class="block">Icone :</label>
            <input type="radio" name="icone" value="fa fa-beer">
            <span class="fa fa-beer"></span>           
            <input type="radio" name="icone" value="fa fa-ambulance">
            <span class="fa fa-ambulance"></span>
            
            <button class="block" type="submit" id="bouton_valider">Créer</button>            
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php
        foreach ($listes as $liste) {
            include_partial("liste/liste",array("liste"=>$liste));
        }
        ?>
    </div>
</div>

