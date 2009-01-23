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
      'id'              => new sfWidgetFormInputHidden(),
      'title'           => new sfWidgetFormInput(),
      'descrip'         => new sfWidgetFormTextarea(),
      'photo_filename'  => new sfWidgetFormInput(),
      'attach_filename' => new sfWidgetFormInput(),
      'url'             => new sfWidgetFormInput(),
      'state'           => new sfWidgetFormInput(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Product', 'column' => 'id', 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 255)),
      'descrip'         => new sfValidatorString(array('required' => false)),
      'photo_filename'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'attach_filename' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }


}
