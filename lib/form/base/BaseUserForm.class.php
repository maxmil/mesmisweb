<?php

/**
 * User form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'surname1'    => new sfWidgetFormInput(),
      'surname2'    => new sfWidgetFormInput(),
      'email'       => new sfWidgetFormInput(),
      'password'    => new sfWidgetFormInput(),
      'institution' => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'surname1'    => new sfValidatorString(array('max_length' => 50)),
      'surname2'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255)),
      'password'    => new sfValidatorString(array('max_length' => 255)),
      'institution' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
