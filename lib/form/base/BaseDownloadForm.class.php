<?php

/**
 * Download form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseDownloadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'product_id' => new sfWidgetFormPropelChoice(array('model' => 'Product', 'add_empty' => true)),
      'culture'    => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'product_id' => new sfValidatorPropelChoice(array('model' => 'Product', 'column' => 'id', 'required' => false)),
      'culture'    => new sfValidatorString(array('max_length' => 7)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'id'         => new sfValidatorPropelChoice(array('model' => 'Download', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Download';
  }


}
