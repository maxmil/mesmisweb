<?php

/**
 * ProductGroup form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseProductGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'alias' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorPropelChoice(array('model' => 'ProductGroup', 'column' => 'id', 'required' => false)),
      'alias' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductGroup';
  }

  public function getI18nModelName()
  {
    return 'ProductGroupI18n';
  }

  public function getI18nFormClass()
  {
    return 'ProductGroupI18nForm';
  }

}
