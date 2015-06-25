<!DOCTYPE html>
<html lang="fr">
    <head>

      <link rel="shortcut icon" href="http://localhost/smartliste/web/images/logo-mini.png" />
      <?php include_http_metas() ?>
      <?php include_metas() ?>
      <?php include_title() ?>
    </head>
    <body>
        <header>
            <div id="b_banniere">
            <?php include_partial('accueil/menu');?>
                <?php echo image_tag('logo_v2.png'); ?>
            </div>
        </header>
        <div class="clean"></div>
        <div id='navigation'><?php if($sf_user->isAuthenticated()) { include_partial("accueil/menu_connected"); } ?></div>
        <div id='corps'>
        <?php 
        //Ecrit le rendu de l'action
        echo $sf_content ?>
        </div>
        <footer>
          <div id="menu_page_bas">
              <ul>
                  <li><a href="<?php echo url_for1('accueil/objectif') ?>">Objectif</a></li>
                  <li><a href="<?php echo url_for1('accueil/index') ?>">Plan du site</a></li>
                  <li><a href="<?php echo url_for1('accueil/index') ?>">Contact</a></li>
              </ul>
          </div>
          <span class="clean"></span>
        </footer>
    </body>
</html>
