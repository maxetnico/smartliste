<div id="menu_1">
    <?php if(!$sf_user->isAuthenticated())
    { ?>
        <button type="button" id="bouton_connexion" class="bouton_connexion">Connexion</button>
        <div id="menu_conn_box" class="menu_box">
            <form method="post" action="<?php echo url_for('accueil/connexion') ?>">
                <span>Login : </span><input type="text" name="pseudo" placeholder="Pseudo"><br>
                <span>Password : </span><input type="password" name="mdp" placeholder="Mot de passe"><br>
                <button type="submit" id="bouton_valider">OK</button>
                <button type="reset" class="bouton_annuler">Annuler</button>
            </form>
        </div>
        <button type="button" id="bouton_inscription" class="bouton_connexion">Inscription</button>
        <div id="menu_insc_box" class="menu_box">
            <form method="post" action="<?php echo url_for('accueil/inscription') ?>">
                <span>Login : </span><input type="text" name="pseudo" placeholder="Pseudo"><br>
                <span>Password : </span><input type="password" name="mdp" placeholder="Mot de passe"><br>
                <!--<span>Mail : </span><input type="text" name="mail" placeholder="Mail (facultatif)"><br>-->
                <button type="submit" id="bouton_inscrire">S'inscrire</button>
                <button type="reset" class="bouton_annuler">Annuler</button>
            </form>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-sm-12 col-xs-6"><h4 class="presentation_pseudo">Bonjour <?php echo $sf_user->getModelUtilisateur()->getPseudo() ?></h4></div>
            <div class="col-sm-12 col-xs-6"><a href="<?php echo url_for("accueil/deconnexion") ?>"><button type="button" id="bouton_deconnexion">Déconnexion</button></a></div>
        </div>
    <?php } ?>
</div>