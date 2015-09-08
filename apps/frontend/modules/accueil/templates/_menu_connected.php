<?php 
$idActive = 0;
$module = $sf_request->getParameter('module');
if($module == "liste")
{
    $idActive = 1;
}
if($module == "magasin")
{
    $idActive = 3;
}
if($module == "produit")
{
    $idActive = 2;
}
?>
<div id="menu_connected">
    <div>
        <ul>
            <li class="<?php echo $idActive==0?'active':'' ?>"><a id="m_Accueil" href="<?php echo url_for1('accueil/index') ?>">Accueil</a></li>
            <li class="<?php echo $idActive==1?'active':'' ?>"><a id="m_Liste" href="<?php echo url_for1('liste/index') ?>">Liste</a></li>
            <li class="<?php echo $idActive==2?'active':'' ?>"><a id="m_Produit" href="<?php echo url_for1('produit/index') ?>">Produit</a></li>
            <li class="<?php echo $idActive==3?'active':'' ?>"><a id="m_Magasin" href="<?php echo url_for1('magasin/index') ?>">Magasin</a></li>
        </ul>
    </div>
</div>