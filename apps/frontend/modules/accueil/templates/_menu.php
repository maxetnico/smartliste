<?php  //onclick="<?php echo url_for1('liste/index')" 

?>
<div id="menu_1">
    <?php if(!$sf_user->isAuthenticated())
    { ?>
        <button type="button" id="bouton_connexion" class="bouton_connexion">Connexion</button>
        <div id="menu_conn_box" class="menu_box">
            <form method="post" action="<?php echo url_for('accueil/connexion') ?>">
                <input type="text" name="pseudo" placeholder="Pseudo">
                <input type="password" name="mdp" placeholder="Mot de passe">
                <button type="submit" id="bouton_valider">OK</button>
                <button type="button" class="bouton_annuler">Annuler</button>
            </form>
        </div>
        <button type="button" id="bouton_inscription" class="bouton_connexion">Inscription</button>
        <div id="menu_insc_box" class="menu_box">
            <form method="post" action="<?php echo url_for('accueil/inscription') ?>">
                <input type="text" name="pseudo" placeholder="Pseudo">
                <input type="password" name="mdp" placeholder="Mot de passe">
                <input type="text" name="mail" placeholder="Mail (facultatif)">
                <button type="submit" id="bouton_inscrire">S'inscrire</button>
                <button type="button" class="bouton_annuler">Annuler</button>
            </form>
        </div>
    <?php } else { ?>
        <h4 class="presentation_pseudo">Bonjour <?php echo $sf_user->getModelUtilisateur()->getPseudo() ?></h4>
        <a href="<?php echo url_for("accueil/deconnexion") ?>"><button type="button" id="bouton_deconnexion">Déconnexion</button></a>
    <?php } ?>
</div>