<?php use_helper('mdAsset') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php use_plugin_javascript('mastodontePlugin','AjaxLoader.js','last'); ?>
  </head>
  <body>
    <div id="header"></div>
      <div id="page">
        <div id="menu">
          <ul>
              <li><a href="<?php echo url_for('default/index')?>" class="active">Inicio</a></li>
              <?php if($sf_user->isAuthenticated()):?>
                  <li><a href="<?php echo url_for('preparacion/index')?>">Preparacion</a></li>
                  <?php if($sf_user->hasGroup("Manejar el instituto")): ?>
                    <li><a href="<?php echo url_for('alumno/index')?>">Alumnos</a></li>
                    <li><a href="<?php echo url_for('facultad/index')?>" >Manejar Instituto</a></li>
                  <?php endif;?>
                  <?php if($sf_user->hasGroup("Mailing")): ?>
                    <li><a href="<?php echo url_for('mailing/index')?>">Mailing</a></li>
                  <?php endif;?>
                  <li><a href="<?php echo url_for('mdAuth/logout')?>">Salir</a></li>
              <?php else: ?>
                    <li><a href="<?php echo url_for('mdAuth/signin')?>">Entrar</a></li>
              <?php endif;?>
          </ul>
        </div>
      <div id="content">
    <?php echo $sf_content ?>
    </div>
    <div id="footer">
        <p> </p>
        <p> </p>
    </div>
</div>
  </body>
</html>
