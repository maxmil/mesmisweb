<?php


abstract class BaseNewsItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $photo_filename;


	
	protected $priority;


	
	protected $state = 'PUBLISHED';


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collNewsItemI18ns;

	
	protected $lastNewsItemI18nCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $culture;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPhotoFilename()
	{

		return $this->photo_filename;
	}

	
	public function getPriority()
	{

		return $this->priority;
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
			$this->modifiedColumns[] = NewsItemPeer::ID;
		}

	} 
	
	public function setPhotoFilename($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->photo_filename !== $v) {
			$this->photo_filename = $v;
			$this->modifiedColumns[] = NewsItemPeer::PHOTO_FILENAME;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v) {
			$this->priority = $v;
			$this->modifiedColumns[] = NewsItemPeer::PRIORITY;
		}

	} 
	
	public function setState($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v || $v === 'PUBLISHED') {
			$this->state = $v;
			$this->modifiedColumns[] = NewsItemPeer::STATE;
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
			$this->modifiedColumns[] = NewsItemPeer::CREATED_AT;
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
			$this->modifiedColumns[] = NewsItemPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->photo_filename = $rs->getString($startcol + 1);

			$this->priority = $rs->getInt($startcol + 2);

			$this->state = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NewsItem object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NewsItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NewsItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(NewsItemPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(NewsItemPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NewsItemPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NewsItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NewsItemPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collNewsItemI18ns !== null) {
				foreach($this->collNewsItemI18ns as $referrerFK) {
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


			if (($retval = NewsItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNewsItemI18ns !== null) {
					foreach($this->collNewsItemI18ns as $referrerFK) {
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
		$pos = NewsItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPhotoFilename();
				break;
			case 2:
				return $this->getPriority();
				break;
			case 3:
				return $this->getState();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NewsItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPhotoFilename(),
			$keys[2] => $this->getPriority(),
			$keys[3] => $this->getState(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NewsItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPhotoFilename($value);
				break;
			case 2:
				$this->setPriority($value);
				break;
			case 3:
				$this->setState($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NewsItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPhotoFilename($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPriority($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setState($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NewsItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(NewsItemPeer::ID)) $criteria->add(NewsItemPeer::ID, $this->id);
		if ($this->isColumnModified(NewsItemPeer::PHOTO_FILENAME)) $criteria->add(NewsItemPeer::PHOTO_FILENAME, $this->photo_filename);
		if ($this->isColumnModified(NewsItemPeer::PRIORITY)) $criteria->add(NewsItemPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(NewsItemPeer::STATE)) $criteria->add(NewsItemPeer::STATE, $this->state);
		if ($this->isColumnModified(NewsItemPeer::CREATED_AT)) $criteria->add(NewsItemPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(NewsItemPeer::UPDATED_AT)) $criteria->add(NewsItemPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NewsItemPeer::DATABASE_NAME);

		$criteria->add(NewsItemPeer::ID, $this->id);

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

		$copyObj->setPhotoFilename($this->photo_filename);

		$copyObj->setPriority($this->priority);

		$copyObj->setState($this->state);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getNewsItemI18ns() as $relObj) {
				$copyObj->addNewsItemI18n($relObj->copy($deepCopy));
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
			self::$peer = new NewsItemPeer();
		}
		return self::$peer;
	}

	
	public function initNewsItemI18ns()
	{
		if ($this->collNewsItemI18ns === null) {
			$this->collNewsItemI18ns = array();
		}
	}

	
	public function getNewsItemI18ns($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNewsItemI18ns === null) {
			if ($this->isNew()) {
			   $this->collNewsItemI18ns = array();
			} else {

				$criteria->add(NewsItemI18nPeer::ID, $this->getId());

				NewsItemI18nPeer::addSelectColumns($criteria);
				$this->collNewsItemI18ns = NewsItemI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NewsItemI18nPeer::ID, $this->getId());

				NewsItemI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastNewsItemI18nCriteria) || !$this->lastNewsItemI18nCriteria->equals($criteria)) {
					$this->collNewsItemI18ns = NewsItemI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNewsItemI18nCriteria = $criteria;
		return $this->collNewsItemI18ns;
	}

	
	public function countNewsItemI18ns($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NewsItemI18nPeer::ID, $this->getId());

		return NewsItemI18nPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNewsItemI18n(NewsItemI18n $l)
	{
		$this->collNewsItemI18ns[] = $l;
		$l->setNewsItem($this);
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
    return $this->getCurrentNewsItemI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentNewsItemI18n($culture)->setTitle($value);
  }

  public function getBody($culture = null)
  {
    return $this->getCurrentNewsItemI18n($culture)->getBody();
  }

  public function setBody($value, $culture = null)
  {
    $this->getCurrentNewsItemI18n($culture)->setBody($value);
  }

  protected $current_i18n = array();

  public function getCurrentNewsItemI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = NewsItemI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setNewsItemI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setNewsItemI18nForCulture(new NewsItemI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setNewsItemI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addNewsItemI18n($object);
  }

} 