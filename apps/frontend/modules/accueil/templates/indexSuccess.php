<div style="background-color: #0f0">
    <span>
    <?php 
        if(count($jeans) > 0)
        {
            echo $jeans[0]->getId(); 
            
        } else
        { 
            echo "Aucun jean n'a été trouvé";
        } ?>
    </span>
</div>