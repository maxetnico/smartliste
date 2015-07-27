        <div id="mag_perso" class="mes_mag block col-sm-8 col-sm-offset-2 col-xs-12">
            <h3>Tous les magasins</h3>
            <form method="post" action="<?php echo url_for('magasin/NouveauMagasin') ?>">
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
                    //echo image_tag('http://www.grandfrais.com/charte/base/img/visual/logo.png',array("width"=>"35px"));
                    echo "</td><td>";
                    echo $magasin->getNom();
                    echo "</td><td class='text-center'>";
                    echo $magasin->getVisibleNom()=="MOI"?'<i class="par_moi fa fa-user"></i>':($magasin->getVisibleNom()=="LST"?'<i class="par_lst fa fa-list-alt"></i>':'<i class="par_sit fa fa-globe"></i>');
                    echo "</td><td>";
                    echo "<a href='".(url_for("magasin/ajoutFavoris").'/magasin/'.$magasin->getId())."' title='ajouter aux favoris'><i class='fa fa-star-o'></i></a>";
                    echo "</td>";
                    
                    echo '</tr>';
                }
                ?>
            </table>
        </form>
        </div>