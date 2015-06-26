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
            <div id="b_banniere">
                <div align="left" class="ban1"><?php include_partial('accueil/menu');?></div>
                <div align="center" class="ban2"><span class="rotation">Smartliste</span><?php echo image_tag('logo_v2.png',array("id"=>"logo")); ?></div>
            </div>
<!--<div align="center" class="row ma-no-h">
  <div align="left" class="col-xs-5"><?php include_partial('accueil/menu');?></div>
  <div align="center" class="col-xs-6"><span class="rotation col-md-5">Smartliste</span><?php echo image_tag('logo_v2.png',array("id"=>"logo","class"=>"col-md-7")); ?></div>
</div>-->
        </header>
        <div class="message_flash">
            <?php if($sf_user->hasFlash("error"))
            { ?>
            <div class="error"><span><?php echo $sf_user->getFlash("error") ?></span></div>
            <?php } ?>
            <?php if($sf_user->hasFlash("info"))
            { ?>
            <div class="info"><span><?php echo $sf_user->getFlash("info") ?></span></div>
            <?php } ?>
        </div>
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
              </ul>
          </div>
          <span class="clean"></span>
        </footer>
    </body>
</html>
