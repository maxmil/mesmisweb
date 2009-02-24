<?php

/**
 * ProductI18n form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseProductI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'    => new sfWidgetFormInput(),
      'descrip'  => new sfWidgetFormTextarea(),
      'resource' => new sfWidgetFormInput(),
      'id'       => new sfWidgetFormInputHidden(),
      'culture'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'title'    => new sfValidatorString(array('max_length' => 255)),
      'descrip'  => new sfValidatorString(array('required' => false)),
      'resource' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'       => new sfValidatorPropelChoice(array('model' => 'Product', 'column' => 'id', 'required' => false)),
      'culture'  => new sfValidatorPropelChoice(array('model' => 'ProductI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductI18n';
  }


}
