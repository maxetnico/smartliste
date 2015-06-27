<!DOCTYPE html>
<html lang="fr">
    <head>

      <link rel="shortcut icon" href="http://localhost/smartliste/web/images/logo-mini.png" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include_http_metas() ?>
      <?php include_metas() ?>
      <?php include_title() ?>
    </head>
    <body>
        <header>
            <div class="ban0 row ma-no-h pa-no-h">
              <div class="ban1 col-sm-3 col-sm-offset-1 col-xs-12 pa-no-h"><?php include_partial('accueil/menu');?></div>
              <div class="clearfix visible-xs-block"></div>
              <div class="ban2 col-sm-4 col-sm-offset-0 col-xs-12 pa-no-h"><span class="rotation">Smartliste</span><?php echo image_tag('logo_v2.png',array("id"=>"logo")); ?></div>
            </div>
        </header>
        <?php include_partial("accueil/messageflash") ?>       
        <div id='navigation'><?php if($sf_user->isAuthenticated()) { include_partial("accueil/menu_connected"); } ?></div>
        <div id='corps'>
        <?php 
        //Ecrit le rendu de l'action
        echo $sf_content ?>
        </div>
        <footer>
          <div id="menu_page_bas">
              <ul>
                  <li><a href="<?php echo url_for1('accueil/objectif') ?>">Qui sommes nous ?</a></li>
                  <li><a href="<?php echo url_for1('accueil/index') ?>">Plan du site</a></li>
                  <li><a href="<?php echo url_for1('accueil/index') ?>">Contact</a></li>
                  <?php
                  if(!$sf_user->isAuthenticated()){
                  ?>
                  <li><a href="<?php echo url_for1('accueil/index') ?>">Accueil</a></li>
                  <?php
                  }
                  ?>
              </ul>
          </div>
          <span class="clean"></span>
        </footer>
    </body>
</html>
