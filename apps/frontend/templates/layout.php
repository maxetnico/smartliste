<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <link rel="shortcut icon" href="http://localhost/smartliste/web/images/logo-mini.png" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
  </head>
  <body>
      <header><?php include '_header.php'; ?>
      <?php include_partial('accueil/menu');
      include_partial('accueil/menu_Connected'); ?>
      </header>
      <div id='navigation'></div>
    <?php 
    //Ecrit le rendu de l'action
    echo $sf_content ?>
      
      <footer><?php include '_footer.php'; ?></footer>
  </body>
</html>
