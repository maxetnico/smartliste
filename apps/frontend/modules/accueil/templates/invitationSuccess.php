<div class="row ma-no-h">
    <h2>Pour partager la liste de course <b><strong><?php echo $liste->getNom() ?></strong></b>, vous pouvez soit :</h2>
</div>
<div class="row ma-no-h">
    <div class="col-md-6 col-xs-12">
        <h3><i class="fa fa-caret-right"></i> Vous connecter :</h3>
        <form method="post" action="<?php echo url_for('accueil/connexion') ?>">
            <span>Login : </span><input type="text" name="pseudo" placeholder="Pseudo"><br>
            <span>Password : </span><input type="password" name="mdp" placeholder="Mot de passe"><br>
            <input type="hidden" name="ticket" value="<?php echo $liste->getIdPartage() ?>">
            <button type="submit" id="bouton_valider">OK</button>
            <button type="button" class="bouton_annuler">Annuler</button>
        </form>
    </div>
    <div class="col-md-6 col-xs-12">
        <h3><i class="fa fa-caret-right"></i> Vous inscrire :</h3>
        <form method="post" action="<?php echo url_for('accueil/inscription') ?>">
            <span>Login : </span><input type="text" name="pseudo" placeholder="Pseudo"><br>
            <span>Password : </span><input type="password" name="mdp" placeholder="Mot de passe"><br>
            <span>Mail : </span><input type="text" name="mail" placeholder="Mail (facultatif)"><br>
            <input type="hidden" name="ticket" value="<?php echo $liste->getIdPartage() ?>">
            <button type="submit" id="bouton_inscrire">S'inscrire</button>
            <button type="button" class="bouton_annuler">Annuler</button>
        </form>
    </div>
</div>