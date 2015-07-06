<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <?php
        echo "<td>";
        echo $magasin->getEtatNom()=="VAL"?"<i class='etat_val fa fa-check-circle'></i>":($magasin->getEtatNom()=="ATT"?"<i class='etat_att fa fa-clock-o'></i>":"<i class='etat_ref fa fa-times-circle'></i>");
        echo "</td><td>";
            echo image_tag('magasins/'.$magasin->getImg(),array("width"=>"35px"));
        echo "</td><td>";
        echo $magasin->getNom();
        echo "</td><td>";
        echo $magasin->getVisibleNom()=="MOI"?'<i class="par_moi fa fa-user"></i>':($magasin->getVisibleNom()=="LST"?'<i class="par_lst fa fa-list-alt"></i>':'<i class="par_sit fa fa-globe"></i>');
        echo "</td><td>";
        echo "</td>";
    ?>