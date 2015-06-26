 <?php
    $arrFlash = array("error","warning","info");
    $hasFlash = false;
    foreach ($arrFlash as $flashName) {
        if($sf_user->hasFlash($flashName))
        {
            $hasFlash = true;
        }
    }
 ?>
<?php
if($hasFlash)
{ 
    ?>
<div class="message_flash">
    <?php
    foreach ($arrFlash as $flashName) {
        if($sf_user->hasFlash($flashName))
        { ?>
            <div class="<?php echo $flashName ?>"><span><?php echo $sf_user->getFlash($flashName) ?></span></div>
        <?php }
    } ?>  
</div>
<?php } 