       
<div id="mag_perso" class="mes_mag block col-sm-8 col-sm-offset-2 col-xs-12">
        <h3>Mes magasins</h3>
        <table align="left" class="mag style_police table">
            <thead>
                <tr class="">
                    <th class="tleft col-xs-1">Etat</th>
                    <th class="col-xs-1">Nom</th>
                    <th class="col-xs-8"></th>
                    <th class="col-xs-1 text-center-important">Partage</th>
                    <th class="tright col-xs-1"></th>
                </tr>
            </thead>
            <?php
            foreach ($magasins as $magasin) {
                echo '<tr class="quitter">';

                echo "<td>";
                echo $magasin->getEtatNom()=="VAL"?"<i class='etat_val fa fa-check-circle'></i>":($magasin->getEtatNom()=="ATT"?"<i class='etat_att fa fa-clock-o'></i>":"<i class='etat_ref fa fa-times-circle'></i>");
                echo "</td><td>";
                echo image_tag('magasins/'.$magasin->getImg(),array("width"=>"35px"));
                //echo image_tag($magasin->getImg(),array("width"=>"35px"));
                echo "</td><td>";
                echo $magasin->getNom();
                echo "</td><td class='text-center'>";
                switch($magasin->getVisibleNom()) {
                    case "MOI" : $mode0="par_moi fa fa-user";$modea='LST';$mode1="par_lst fa fa-list-alt";$modeb='SIT';$mode2="par_sit fa fa-globe";break;
                    case "LST" : $mode0="par_lst fa fa-list-alt";$modea='MOI';$mode1="par_moi fa fa-user";$modeb='SIT';$mode2="par_sit fa fa-globe";break;
                    case "SIT" : $mode0="par_sit fa fa-globe";$modea='MOI';$mode1="par_moi fa fa-user";$modeb='LST';$mode2="par_lst fa fa-list-alt";break;
                }
                echo '<i id="partline'.$magasin->getId().'" class="'.$mode0.'" value="'.$magasin->getId().'">';
//                echo "<div id='partmode".$magasin->getId()."' name='partageval".$magasin->getId()."' class='choixpart menu_box '><ul><li><a href='".(url_for("magasin/changePartage").'/partage/'.$magasin->getId())."' title='Changer mode'><i class='".$mode1."'></i></a></li>";
//                echo "<li><a href='".(url_for("magasin/changePartage").'/partage/'.$magasin->getId())."' title='Changer mode'><i class='".$mode2."'></i></a></li></ul></div>";
                echo "</i></td><td>";
                echo "<a href='".(url_for("magasin/quitter").'/magasin/'.$magasin->getId())."' title='Quitter'><i class='fa fa-share-square'></i></a>";
                echo "</td>";
                echo '</tr>';
            }
            ?>
            <script>
//                $("[id^=partline]").on('click',function(){ $("#"+$(this).prop("id")+" > div").toggle()});
//                $("[id^=partline]").css('z-index','10');
//                $("[id^=partmode]").on('click',function(){$("[id^=partmode]").toggle(false); $(this).css('z-index','999'); });
            </script>
        </table>
</div>
<?php
if( $magasinsfav->count() != null) { ?>
<div id="mag_perso" class="mes_mag block col-sm-8 col-sm-offset-2 col-xs-12">
        <h3>Mes Favoris</h3>
        <table align="left" class="mag style_police table">
            <thead>
                <tr class="">
                    <th class="tleft col-xs-1">Nom</th>
                    <th class="col-xs-10"></th>
                    <th class="tright col-xs-1"></th>
                </tr>
            </thead>
            <?php
            foreach ($magasinsfav as $magasin2) {
                $mag = MagasinPeer::retrieveByPK($magasin2->getIdMagasin());
                echo '<tr class="quitter">';

                echo "<td>";
                echo image_tag('magasins/'.$mag->getImg(),array("width"=>"35px"));
                echo "</td><td>";
                echo $mag->getNom();
                echo "</td><td>";
                echo "<a href='".(url_for("magasin/quitterFavoris").'/magasin2/'.$magasin2->getId())."' title='Quitter favoris'><i class='fa fa-share-square'></i></a>";
                echo "</td>";

                echo '</tr>';
            }
            ?>
        </table>
</div>
<?php } ?>