<?php

/**
 * NewsItem form base class.
 *
 * @package    mesmisweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseNewsItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'title'          => new sfWidgetFormInput(),
      'descrip'        => new sfWidgetFormTextarea(),
      'body'           => new sfWidgetFormTextarea(),
      'photo_filename' => new sfWidgetFormInput(),
      'priority'       => new sfWidgetFormInput(),
      'state'          => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'NewsItem', 'column' => 'id', 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 255)),
      'descrip'        => new sfValidatorString(),
      'body'           => new sfValidatorString(array('required' => false)),
      'photo_filename' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'priority'       => new sfValidatorInteger(array('required' => false)),
      'state'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsItem';
  }


}
