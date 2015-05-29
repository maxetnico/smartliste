<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <link rel="shortcut icon" href="http://localhost/smartliste/web/images/logo-mini.png" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
  </head>
  <body style="background-color: #00A">
      <?php include_partial('accueil/menu'); ?>
      <h1>BIBI</h1>
      
      
    <?php 
    //Ecrit le rendu de l'action
    echo $sf_content ?>
  </body>
</html>
