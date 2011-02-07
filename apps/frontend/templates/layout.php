<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php //use_stylesheet('ui-lightness/jquery-ui-1.8.2.custom.css') ?>
    
  </head>
  <body>
    <div id="header"></div>
      <div id="page">
        <div id="menu">
          <ul>
              <li><a href="<?php echo url_for('default/index')?>" class="active">Inicio</a></li>
              <li><a href="<?php echo url_for('alumno/index')?>">Alumnos</a></li>
              <li><a href="<?php echo url_for('preparacion/index')?>">Preparacion</a></li>
              <li><a href="<?php echo url_for('facultad/index')?>" >Manejar Instituto</a></li>
              <li><a href="<?php echo url_for('calendarioMaterias/index')?>">Calendario</a></li>
          </ul>
        </div>
      <div id="content">
    <?php echo $sf_content ?>
    </div>
    <div id="footer">
        <p>Copyleft    </p>
        <p><!--This theme is free for distriubtion,  so long as  link to openwebdesing.org and dubaiapartments.biz  stay on the theme--> Courtesy <a href="http://www.openwebdesign.org" target="_blank">Open
Web Design</a><a href="http://www.dubaiapartments.biz" target="_blank"><img src="/images/spacer.gif" width="5" height="5" border="0"/></a>Thanks
to <a href="http://www.dubaiapartments.biz/" target="_blank">Dubai Hotels</a> </p>
    </div>
</div>
  </body>
</html>
