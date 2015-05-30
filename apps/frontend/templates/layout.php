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
            <div id="banniere"></div>
            <?php echo image_tag('logo_v2.png'); ?>
            <?php include_partial('accueil/menu');?>
        </header>
        <div id='navigation'></div>
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
