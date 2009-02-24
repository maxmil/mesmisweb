<?php

/**
 * Product form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseProductForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'product_group_id' => new sfWidgetFormPropelChoice(array('model' => 'ProductGroup', 'add_empty' => true)),
      'mimetype'         => new sfWidgetFormInput(),
      'priority'         => new sfWidgetFormInput(),
      'type'             => new sfWidgetFormInput(),
      'state'            => new sfWidgetFormInput(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Product', 'column' => 'id', 'required' => false)),
      'product_group_id' => new sfValidatorPropelChoice(array('model' => 'ProductGroup', 'column' => 'id', 'required' => false)),
      'mimetype'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'priority'         => new sfValidatorInteger(array('required' => false)),
      'type'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'state'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

  public function getI18nModelName()
  {
    return 'ProductI18n';
  }

  public function getI18nFormClass()
  {
    return 'ProductI18nForm';
  }

}
