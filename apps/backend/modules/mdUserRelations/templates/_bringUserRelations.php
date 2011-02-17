<div class="clear"></div>
<h2>Personas a cargo</h2>
<?php foreach($userList as $user): ?>
    <?php
        $isSelected = false;
        $index = 0;
        while($index < count($encargados) && !$isSelected)
        {
            if($encargados[$index]->getMdUserEnresponsabilidadId() == $user->getId())
            {
                $isSelected = true;
            }
            $index++;
        }
    ?>
    <?php if($user->getId() != $id): ?>
    <input <?php if($isSelected)echo 'checked';?> id="encargado_<?php echo $user->getId();?>" type="checkbox" value="<?php echo $user->getId();?>" onclick="return sendNewEncargado(this, <?php echo $id?>,<?php echo $user->getId();?>)"/><?php echo $user->__toString();?>
    <br/>
    <?php endif;?>
<?php endforeach;?>

<script type="text/javascript">

function sendNewEncargado(element, id, encargadoId)
{
    var element_id =$(element).attr('id');
    var checked =  "#"+element_id+":checked";
    var active = false;
    if($(checked).length > 0)
    {
        active = true;
    }
    var url = '<?php echo url_for("mdUserRelations/changeEncargadoRelation");?>';
    var dataString = 'id='+id+ '&encargadoId='+$(element).val() + '&checked='+active;
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: dataString,
        success: function(data){
            if(data.response == "OK"){
                
            }
        }

    });
}

</script>