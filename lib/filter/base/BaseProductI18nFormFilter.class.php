<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ProductI18n filter form base class.
 *
 * @package    mesmisweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseProductI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'           => new sfWidgetFormFilterInput(),
      'descrip'         => new sfWidgetFormFilterInput(),
      'photo_filename'  => new sfWidgetFormFilterInput(),
      'attach_filename' => new sfWidgetFormFilterInput(),
      'url'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'           => new sfValidatorPass(array('required' => false)),
      'descrip'         => new sfValidatorPass(array('required' => false)),
      'photo_filename'  => new sfValidatorPass(array('required' => false)),
      'attach_filename' => new sfValidatorPass(array('required' => false)),
      'url'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductI18n';
  }

  public function getFields()
  {
    return array(
      'title'           => 'Text',
      'descrip'         => 'Text',
      'photo_filename'  => 'Text',
      'attach_filename' => 'Text',
      'url'             => 'Text',
      'id'              => 'ForeignKey',
      'culture'         => 'Text',
    );
  }
}
