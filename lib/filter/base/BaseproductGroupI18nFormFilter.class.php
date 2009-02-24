<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * productGroupI18n filter form base class.
 *
 * @package    mesmisweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseproductGroupI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_group_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'productGroupI18n';
  }

  public function getFields()
  {
    return array(
      'title'   => 'Text',
      'id'      => 'ForeignKey',
      'culture' => 'Text',
    );
  }
}
