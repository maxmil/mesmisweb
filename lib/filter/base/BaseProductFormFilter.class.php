<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Product filter form base class.
 *
 * @package    mesmisweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseProductFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_group_id' => new sfWidgetFormPropelChoice(array('model' => 'ProductGroup', 'add_empty' => true)),
      'mimetype'         => new sfWidgetFormFilterInput(),
      'icon'             => new sfWidgetFormFilterInput(),
      'priority'         => new sfWidgetFormFilterInput(),
      'type'             => new sfWidgetFormFilterInput(),
      'state'            => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'product_group_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ProductGroup', 'column' => 'id')),
      'mimetype'         => new sfValidatorPass(array('required' => false)),
      'icon'             => new sfValidatorPass(array('required' => false)),
      'priority'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'             => new sfValidatorPass(array('required' => false)),
      'state'            => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'product_group_id' => 'ForeignKey',
      'mimetype'         => 'Text',
      'icon'             => 'Text',
      'priority'         => 'Number',
      'type'             => 'Text',
      'state'            => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
