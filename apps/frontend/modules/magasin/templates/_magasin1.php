<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <?php
        echo "<td width='37px'>";
        echo $magasin->getEtatNom()=="VAL"?"<i class='mag_val fa fa-check-circle'></i>":($magasin->getEtatNom()=="ATT"?"<i class='mag_att fa fa-clock-o'></i>":"<i class='mag_ref fa fa-times-circle'></i>");
        echo "</td>";
        echo "<td>";
            echo image_tag('magasins/'.$magasin->getImg(),array("width"=>"35px"));
        echo $magasin->getNom();
        echo "</td>";
        echo "<td>";
        echo $magasin->getVisibleNom();
        echo "</td>";
    ?>