<?php

/**
 * mailing form.
 *
 * @package    instituto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailingForm extends BasemailingForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->widgetSchema['texto'] = new sfWidgetFormTinyEditorTextAreaConfigurable(array(
                            'value'=>$this->getObject()->getTexto(),
                            'width' => 400,
                            'height' => 400,
                            'config' => 'plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist, spellchecker",
                                        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo",
                                        theme_advanced_buttons2 : "link,unlink,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|fullscreen,|,cut,copy,paste,pastetext,pasteword,|, spellchecker",
                                        theme_advanced_buttons3 : "",
                                        theme_advanced_buttons4 : ""'
                        ));
  }
}
