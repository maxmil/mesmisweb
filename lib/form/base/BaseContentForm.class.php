<?php

/**
 * Content form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseContentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'alias'      => new sfWidgetFormInput(),
      'state'      => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Content', 'column' => 'id', 'required' => false)),
      'alias'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'state'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

  public function getI18nModelName()
  {
    return 'ContentI18n';
  }

  public function getI18nFormClass()
  {
    return 'ContentI18nForm';
  }

}
