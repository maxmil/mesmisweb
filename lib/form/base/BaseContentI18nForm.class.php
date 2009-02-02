<?php

/**
 * ContentI18n form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseContentI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'   => new sfWidgetFormTextarea(),
      'body'    => new sfWidgetFormTextarea(),
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'title'   => new sfValidatorString(),
      'body'    => new sfValidatorString(array('required' => false)),
      'id'      => new sfValidatorPropelChoice(array('model' => 'Content', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'ContentI18n', 'column' => 'culture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('content_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContentI18n';
  }


}
