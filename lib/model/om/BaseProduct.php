<?php


abstract class BaseProduct extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $product_group_id;


	
	protected $mimetype;


	
	protected $icon;


	
	protected $priority;


	
	protected $type;


	
	protected $state = 'PUBLISHED';


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aProductGroup;

	
	protected $collProductI18ns;

	
	protected $lastProductI18nCriteria = null;

	
	protected $collDownloads;

	
	protected $lastDownloadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $culture;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getProductGroupId()
	{

		return $this->product_group_id;
	}

	
	public function getMimetype()
	{

		return $this->mimetype;
	}

	
	public function getIcon()
	{

		return $this->icon;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductPeer::ID;
		}

	} 
	
	public function setProductGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->product_group_id !== $v) {
			$this->product_group_id = $v;
			$this->modifiedColumns[] = ProductPeer::PRODUCT_GROUP_ID;
		}

		if ($this->aProductGroup !== null && $this->aProductGroup->getId() !== $v) {
			$this->aProductGroup = null;
		}

	} 
	
	public function setMimetype($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mimetype !== $v) {
			$this->mimetype = $v;
			$this->modifiedColumns[] = ProductPeer::MIMETYPE;
		}

	} 
	
	public function setIcon($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->icon !== $v) {
			$this->icon = $v;
			$this->modifiedColumns[] = ProductPeer::ICON;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v) {
			$this->priority = $v;
			$this->modifiedColumns[] = ProductPeer::PRIORITY;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = ProductPeer::TYPE;
		}

	} 
	
	public function setState($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v || $v === 'PUBLISHED') {
			$this->state = $v;
			$this->modifiedColumns[] = ProductPeer::STATE;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = ProductPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = ProductPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->product_group_id = $rs->getInt($startcol + 1);

			$this->mimetype = $rs->getString($startcol + 2);

			$this->icon = $rs->getString($startcol + 3);

			$this->priority = $rs->getInt($startcol + 4);

			$this->type = $rs->getString($startcol + 5);

			$this->state = $rs->getString($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Product object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProductPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ProductPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ProductPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aProductGroup !== null) {
				if ($this->aProductGroup->isModified() || ($this->aProductGroup->getCulture() && $this->aProductGroup->getCurrentProductGroupI18n()->isModified())) {
					$affectedRows += $this->aProductGroup->save($con);
				}
				$this->setProductGroup($this->aProductGroup);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProductPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProductI18ns !== null) {
				foreach($this->collProductI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDownloads !== null) {
				foreach($this->collDownloads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aProductGroup !== null) {
				if (!$this->aProductGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProductGroup->getValidationFailures());
				}
			}


			if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProductI18ns !== null) {
					foreach($this->collProductI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDownloads !== null) {
					foreach($this->collDownloads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getProductGroupId();
				break;
			case 2:
				return $this->getMimetype();
				break;
			case 3:
				return $this->getIcon();
				break;
			case 4:
				return $this->getPriority();
				break;
			case 5:
				return $this->getType();
				break;
			case 6:
				return $this->getState();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProductPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProductGroupId(),
			$keys[2] => $this->getMimetype(),
			$keys[3] => $this->getIcon(),
			$keys[4] => $this->getPriority(),
			$keys[5] => $this->getType(),
			$keys[6] => $this->getState(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setProductGroupId($value);
				break;
			case 2:
				$this->setMimetype($value);
				break;
			case 3:
				$this->setIcon($value);
				break;
			case 4:
				$this->setPriority($value);
				break;
			case 5:
				$this->setType($value);
				break;
			case 6:
				$this->setState($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProductPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProductGroupId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMimetype($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPriority($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductPeer::ID)) $criteria->add(ProductPeer::ID, $this->id);
		if ($this->isColumnModified(ProductPeer::PRODUCT_GROUP_ID)) $criteria->add(ProductPeer::PRODUCT_GROUP_ID, $this->product_group_id);
		if ($this->isColumnModified(ProductPeer::MIMETYPE)) $criteria->add(ProductPeer::MIMETYPE, $this->mimetype);
		if ($this->isColumnModified(ProductPeer::ICON)) $criteria->add(ProductPeer::ICON, $this->icon);
		if ($this->isColumnModified(ProductPeer::PRIORITY)) $criteria->add(ProductPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ProductPeer::TYPE)) $criteria->add(ProductPeer::TYPE, $this->type);
		if ($this->isColumnModified(ProductPeer::STATE)) $criteria->add(ProductPeer::STATE, $this->state);
		if ($this->isColumnModified(ProductPeer::CREATED_AT)) $criteria->add(ProductPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ProductPeer::UPDATED_AT)) $criteria->add(ProductPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		$criteria->add(ProductPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProductGroupId($this->product_group_id);

		$copyObj->setMimetype($this->mimetype);

		$copyObj->setIcon($this->icon);

		$copyObj->setPriority($this->priority);

		$copyObj->setType($this->type);

		$copyObj->setState($this->state);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProductI18ns() as $relObj) {
				$copyObj->addProductI18n($relObj->copy($deepCopy));
			}

			foreach($this->getDownloads() as $relObj) {
				$copyObj->addDownload($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductPeer();
		}
		return self::$peer;
	}

	
	public function setProductGroup($v)
	{


		if ($v === null) {
			$this->setProductGroupId(NULL);
		} else {
			$this->setProductGroupId($v->getId());
		}


		$this->aProductGroup = $v;
	}


	
	public function getProductGroup($con = null)
	{
		if ($this->aProductGroup === null && ($this->product_group_id !== null)) {
						$this->aProductGroup = ProductGroupPeer::retrieveByPK($this->product_group_id, $con);

			
		}
		return $this->aProductGroup;
	}

	
	public function initProductI18ns()
	{
		if ($this->collProductI18ns === null) {
			$this->collProductI18ns = array();
		}
	}

	
	public function getProductI18ns($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProductI18ns === null) {
			if ($this->isNew()) {
			   $this->collProductI18ns = array();
			} else {

				$criteria->add(ProductI18nPeer::ID, $this->getId());

				ProductI18nPeer::addSelectColumns($criteria);
				$this->collProductI18ns = ProductI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProductI18nPeer::ID, $this->getId());

				ProductI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastProductI18nCriteria) || !$this->lastProductI18nCriteria->equals($criteria)) {
					$this->collProductI18ns = ProductI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProductI18nCriteria = $criteria;
		return $this->collProductI18ns;
	}

	
	public function countProductI18ns($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProductI18nPeer::ID, $this->getId());

		return ProductI18nPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProductI18n(ProductI18n $l)
	{
		$this->collProductI18ns[] = $l;
		$l->setProduct($this);
	}

	
	public function initDownloads()
	{
		if ($this->collDownloads === null) {
			$this->collDownloads = array();
		}
	}

	
	public function getDownloads($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDownloads === null) {
			if ($this->isNew()) {
			   $this->collDownloads = array();
			} else {

				$criteria->add(DownloadPeer::PRODUCT_ID, $this->getId());

				DownloadPeer::addSelectColumns($criteria);
				$this->collDownloads = DownloadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DownloadPeer::PRODUCT_ID, $this->getId());

				DownloadPeer::addSelectColumns($criteria);
				if (!isset($this->lastDownloadCriteria) || !$this->lastDownloadCriteria->equals($criteria)) {
					$this->collDownloads = DownloadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDownloadCriteria = $criteria;
		return $this->collDownloads;
	}

	
	public function countDownloads($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DownloadPeer::PRODUCT_ID, $this->getId());

		return DownloadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDownload(Download $l)
	{
		$this->collDownloads[] = $l;
		$l->setProduct($this);
	}


	
	public function getDownloadsJoinUser($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDownloads === null) {
			if ($this->isNew()) {
				$this->collDownloads = array();
			} else {

				$criteria->add(DownloadPeer::PRODUCT_ID, $this->getId());

				$this->collDownloads = DownloadPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(DownloadPeer::PRODUCT_ID, $this->getId());

			if (!isset($this->lastDownloadCriteria) || !$this->lastDownloadCriteria->equals($criteria)) {
				$this->collDownloads = DownloadPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastDownloadCriteria = $criteria;

		return $this->collDownloads;
	}

  public function getCulture()
  {
    return $this->culture;
  }

  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getTitle($culture = null)
  {
    return $this->getCurrentProductI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentProductI18n($culture)->setTitle($value);
  }

  public function getDescrip($culture = null)
  {
    return $this->getCurrentProductI18n($culture)->getDescrip();
  }

  public function setDescrip($value, $culture = null)
  {
    $this->getCurrentProductI18n($culture)->setDescrip($value);
  }

  public function getResource($culture = null)
  {
    return $this->getCurrentProductI18n($culture)->getResource();
  }

  public function setResource($value, $culture = null)
  {
    $this->getCurrentProductI18n($culture)->setResource($value);
  }

  protected $current_i18n = array();

  public function getCurrentProductI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = ProductI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setProductI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setProductI18nForCulture(new ProductI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setProductI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addProductI18n($object);
  }

} 