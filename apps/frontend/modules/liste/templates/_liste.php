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
<div class="liste">
    <div class="icone" style="<?php echo $bakckgroundIcone ?>"><span class="<?php echo $liste->getIcone() ?>"></span></div>
    <div class="nom" style="<?php echo $bakckgroundNom ?>"><span class="<?php echo $liste->getNom() ?>"></span></div>
</div>