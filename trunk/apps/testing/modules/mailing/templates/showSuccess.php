<?php
  use_javascript("mailingShow.js");
  use_helper('mdAsset');
  use_plugin_javascript('mastodontePlugin','AjaxLoader.js','last');
?>
<a href="<?php echo url_for('mailing/edit?id='.$mailing->getId()) ?>" class="hyperlink">Edit</a>
&nbsp;
<a href="<?php echo url_for('mailing/index') ?>" class="hyperlink">List</a>
<hr />
<table>
  <tbody>
    <tr>
      <th>Texto:</th>
      <td><?php echo html_entity_decode($mailing->getTexto()) ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo format_date($mailing->getCreatedAt(),'D') ?></td>
    </tr>
  </tbody>
</table>

<a class="hyperlink" href="javascript:void(0)" onclick="return bringAlumnosList('<?php echo url_for("alumno/bringAlumnosList"); ?>');" > Buscar Alumnos </a>
<div class="clear"></div>
<input id="sendMailsButton" style="display:none" type="button" value="Enviar a los seleccionados" onclick="startProccessOfSendingMail('<?php echo url_for("mailing/sendMailing"); ?>', <?php echo $mailing->getId();?>);"/>
<div id="alumnos_container"></div>


