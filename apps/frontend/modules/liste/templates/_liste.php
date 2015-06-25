<?php
//Lors de l'appel à ce template, il faut passer en paramètre le model d'une liste nommé "liste"

$backgroundIcone = ' background: -webkit-linear-gradient(left, #fff , '.$liste->getCouleur().');
  background: -o-linear-gradient(right, #fff, '.$liste->getCouleur().');
  background: -moz-linear-gradient(right, #fff, '.$liste->getCouleur().');
  background: linear-gradient(to right, #fff , '.$liste->getCouleur().');';

$backgroundNom = ' background: -webkit-linear-gradient(left, '.$liste->getCouleur().', #fff);
  background: -o-linear-gradient(right, '.$liste->getCouleur().', #fff);
  background: -moz-linear-gradient(right, '.$liste->getCouleur().', #fff);
  background: linear-gradient(to right, '.$liste->getCouleur().', #fff);';

?>
<div class="liste row" onclick="allerALUrl(<?php echo "'".url_for("liste/detail").'/liste/'.$liste->getId()."'"; ?>)">
    <div class="icone col-xs-offset-1 col-xs-1" style="<?php echo $backgroundIcone ?>"><span class="<?php echo $liste->getIcone() ?> hidden-sm hidden-xs"></span></div>
    <div class="nom col-xs-9" style="<?php echo $backgroundNom ?>">
        <span><?php echo $liste->getNom() ?></span>
        <a href="<?php echo url_for("liste/quitter").'/liste/'.$liste->getId() ?>" title="Quitter"><span class="quitter fa fa-share-square-o"></span></a>
    </div>
</div>