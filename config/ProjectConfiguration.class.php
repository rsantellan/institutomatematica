<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('mastodontePlugin');
    $this->enablePlugins('mdAttributeDoctrinePlugin');
    $this->enablePlugins('mdAuthDoctrinePlugin');
    $this->enablePlugins('mdContactPlugin');
    $this->enablePlugins('mdImageFileGalleryPlugin');
    $this->enablePlugins('mdMediaDoctrinePlugin');
    $this->enablePlugins('mdMediaManagerPlugin');
    $this->enablePlugins('mdTranslatorObjectDoctrinePlugin');
    $this->enablePlugins('mdTranslatorPlugin');
    $this->enablePlugins('mdUserDoctrinePlugin');
    $this->enablePlugins('mdUserGroupsAndPermissionDoctrinePlugin');
    $this->enablePlugins('sfExtraWidgetsPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
  }
}
