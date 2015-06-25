<div class="col-xs-12">
    <button type="button" id="bouton_addliste"><span class="fa fa-plus"></span> Ajouter une liste</button>
    <div id="menu_addliste_box" class="menu_box ma-no-v">
        <form method="post" action="<?php echo url_for('liste/add') ?>">
            <input type="text" name="nom" placeholder="Nom de la liste">
            
            <button type="submit" id="bouton_valider">Créer</button>            
        </form>
    </div>
</div>

<?php

var_dump($listes);
