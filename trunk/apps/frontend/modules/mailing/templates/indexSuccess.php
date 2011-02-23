<h1>Mailings List</h1>
<?php use_javascript("mailingIndex.js");?>
<?php use_helper("Text");?>


<a href="<?php echo url_for('mailing/new') ?>" class="hyperlink">Crear un nuevo texto</a>
<div class="clear"></div>
<?php foreach ($mailings as $mailing): ?>
    <div class="mailing_index_div">
        <ul class="mailing_ul">
            <li><a href="<?php echo url_for('mailing/show?id='.$mailing->getId()) ?>" class="hyperlink"><strong>Utilizar el siguiente texto.</strong></a></li>
            <li><strong>Creado el:</strong> <?php echo format_date($mailing->getCreatedAt(),'D') ?></li>
            <li>
                <strong>Ejemplo del texto:</strong><?php echo truncate_text($mailing->getTexto())  ?>
                <div class="clear"></div>
                <a id="show_link_<?php echo $mailing->getId();?>" href="javascript:void(0)" onclick="showFullText(<?php echo $mailing->getId();?>)">Mostrar el texto completo</a>
                <a style="display:none" id="hide_link_<?php echo $mailing->getId();?>" href="javascript:void(0)" onclick="showFullText(<?php echo $mailing->getId();?>)">Ocultar el texto completo</a>
                <div class="clear"></div>
                <span id="span_<?php echo $mailing->getId();?>" style="display:none" class="mailing_full_text"><?php echo html_entity_decode($mailing->getTexto());?></span>
            </li>
        </ul>
    </div>

<?php endforeach; ?>
<div class="clear"></div>
