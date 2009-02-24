<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ProductGroup filter form base class.
 *
 * @package    mesmisweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseProductGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'alias' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'alias' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductGroup';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'alias' => 'Text',
    );
  }
}
