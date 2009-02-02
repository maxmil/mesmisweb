<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Download filter form base class.
 *
 * @package    mesmisweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseDownloadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'product_id' => new sfWidgetFormPropelChoice(array('model' => 'Product', 'add_empty' => true)),
      'culture'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'product_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Product', 'column' => 'id')),
      'culture'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('download_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Download';
  }

  public function getFields()
  {
    return array(
      'user_id'    => 'ForeignKey',
      'product_id' => 'ForeignKey',
      'culture'    => 'Text',
      'created_at' => 'Date',
      'id'         => 'Number',
    );
  }
}
