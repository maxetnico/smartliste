<div class="row ma-no-h">
    <div class="col-xs-12">
        <?php
        foreach ($listes as $liste) {
            include_partial("magasin/magasin",array("boolEnDetail" => false, "liste"=>$liste));
        }
        ?>
    </div>
</div>