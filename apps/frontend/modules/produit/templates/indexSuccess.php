<?php use_helper('Javascript') ?>
<script>
$(document).ready(function(){
    $('#bout1').on('click',function(){
        $('#jobs').load($(this).parents('form').prop('action'), { query: 'produit1' }, function(){ $('#loader').hide();});
        alert('ok2');
    })
})
</script>
<form id="formprod" method="post" action='<?php echo url_for('produit/prod1');?>'>
    <button id='bout1' type="submit">prod1</button>
    <button id='bout2' type="submit">prod2</button>
    <input type="hidden" id="info" value="haha">
    <?php echo image_tag('loading4.gif',array("id"=>"loader","width"=>"20px","style"=>"vertical-align: middle;display:none;")); ?>

    <div id="jobs" class="block"></div>
</form>
