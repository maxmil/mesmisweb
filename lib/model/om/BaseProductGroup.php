<?php

/**
 * Base class that represents a row from the 'product_group' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Feb 28 12:21:28 2009
 *
 * @package    lib.model.om
 */
abstract class BaseProductGroup extends BaseObject  implements Persistent {


  const PEER = 'ProductGroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProductGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the alias field.
	 * @var        string
	 */
	protected $alias;

	/**
	 * @var        array ProductGroupI18n[] Collection to store aggregation of ProductGroupI18n objects.
	 */
	protected $collProductGroupI18ns;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProductGroupI18ns.
	 */
	private $lastProductGroupI18nCriteria = null;

	/**
	 * @var        array Product[] Collection to store aggregation of Product objects.
	 */
	protected $collProducts;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProducts.
	 */
	private $lastProductCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

  /**
   * The value for the culture field.
   * @var string
   */
  protected $culture;

	/**
	 * Initializes internal state of BaseProductGroup object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [alias] column value.
	 * 
	 * @return     string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProductGroup The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductGroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [alias] column.
	 * 
	 * @param      string $v new value
	 * @return     ProductGroup The current object (for fluent API support)
	 */
	public function setAlias($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alias !== $v) {
			$this->alias = $v;
			$this->modifiedColumns[] = ProductGroupPeer::ALIAS;
		}

		return $this;
	} // setAlias()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->alias = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 2; // 2 = ProductGroupPeer::NUM_COLUMNS - ProductGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProductGroup object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProductGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collProductGroupI18ns = null;
			$this->lastProductGroupI18nCriteria = null;

			$this->collProducts = null;
			$this->lastProductCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseProductGroup:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ProductGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProductGroup:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseProductGroup:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProductGroup:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			ProductGroupPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProductGroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductGroupPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProductGroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProductGroupI18ns !== null) {
				foreach ($this->collProductGroupI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProducts !== null) {
				foreach ($this->collProducts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
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

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = ProductGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProductGroupI18ns !== null) {
					foreach ($this->collProductGroupI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProducts !== null) {
					foreach ($this->collProducts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProductGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAlias();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ProductGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAlias(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProductGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAlias($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProductGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAlias($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductGroupPeer::ID)) $criteria->add(ProductGroupPeer::ID, $this->id);
		if ($this->isColumnModified(ProductGroupPeer::ALIAS)) $criteria->add(ProductGroupPeer::ALIAS, $this->alias);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);

		$criteria->add(ProductGroupPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ProductGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAlias($this->alias);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProductGroupI18ns() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProductGroupI18n($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProducts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProduct($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     ProductGroup Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ProductGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collProductGroupI18ns collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProductGroupI18ns()
	 */
	public function clearProductGroupI18ns()
	{
		$this->collProductGroupI18ns = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProductGroupI18ns collection (array).
	 *
	 * By default this just sets the collProductGroupI18ns collection to an empty array (like clearcollProductGroupI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProductGroupI18ns()
	{
		$this->collProductGroupI18ns = array();
	}

	/**
	 * Gets an array of ProductGroupI18n objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProductGroup has previously been saved, it will retrieve
	 * related ProductGroupI18ns from storage. If this ProductGroup is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProductGroupI18n[]
	 * @throws     PropelException
	 */
	public function getProductGroupI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProductGroupI18ns === null) {
			if ($this->isNew()) {
			   $this->collProductGroupI18ns = array();
			} else {

				$criteria->add(ProductGroupI18nPeer::ID, $this->id);

				ProductGroupI18nPeer::addSelectColumns($criteria);
				$this->collProductGroupI18ns = ProductGroupI18nPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProductGroupI18nPeer::ID, $this->id);

				ProductGroupI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastProductGroupI18nCriteria) || !$this->lastProductGroupI18nCriteria->equals($criteria)) {
					$this->collProductGroupI18ns = ProductGroupI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProductGroupI18nCriteria = $criteria;
		return $this->collProductGroupI18ns;
	}

	/**
	 * Returns the number of related ProductGroupI18n objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProductGroupI18n objects.
	 * @throws     PropelException
	 */
	public function countProductGroupI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProductGroupI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProductGroupI18nPeer::ID, $this->id);

				$count = ProductGroupI18nPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProductGroupI18nPeer::ID, $this->id);

				if (!isset($this->lastProductGroupI18nCriteria) || !$this->lastProductGroupI18nCriteria->equals($criteria)) {
					$count = ProductGroupI18nPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collProductGroupI18ns);
				}
			} else {
				$count = count($this->collProductGroupI18ns);
			}
		}
		$this->lastProductGroupI18nCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ProductGroupI18n object to this object
	 * through the ProductGroupI18n foreign key attribute.
	 *
	 * @param      ProductGroupI18n $l ProductGroupI18n
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProductGroupI18n(ProductGroupI18n $l)
	{
		if ($this->collProductGroupI18ns === null) {
			$this->initProductGroupI18ns();
		}
		if (!in_array($l, $this->collProductGroupI18ns, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProductGroupI18ns, $l);
			$l->setProductGroup($this);
		}
	}

	/**
	 * Clears out the collProducts collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProducts()
	 */
	public function clearProducts()
	{
		$this->collProducts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProducts collection (array).
	 *
	 * By default this just sets the collProducts collection to an empty array (like clearcollProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProducts()
	{
		$this->collProducts = array();
	}

	/**
	 * Gets an array of Product objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProductGroup has previously been saved, it will retrieve
	 * related Products from storage. If this ProductGroup is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Product[]
	 * @throws     PropelException
	 */
	public function getProducts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProducts === null) {
			if ($this->isNew()) {
			   $this->collProducts = array();
			} else {

				$criteria->add(ProductPeer::PRODUCT_GROUP_ID, $this->id);

				ProductPeer::addSelectColumns($criteria);
				$this->collProducts = ProductPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProductPeer::PRODUCT_GROUP_ID, $this->id);

				ProductPeer::addSelectColumns($criteria);
				if (!isset($this->lastProductCriteria) || !$this->lastProductCriteria->equals($criteria)) {
					$this->collProducts = ProductPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProductCriteria = $criteria;
		return $this->collProducts;
	}

	/**
	 * Returns the number of related Product objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Product objects.
	 * @throws     PropelException
	 */
	public function countProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductGroupPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProducts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProductPeer::PRODUCT_GROUP_ID, $this->id);

				$count = ProductPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProductPeer::PRODUCT_GROUP_ID, $this->id);

				if (!isset($this->lastProductCriteria) || !$this->lastProductCriteria->equals($criteria)) {
					$count = ProductPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collProducts);
				}
			} else {
				$count = count($this->collProducts);
			}
		}
		$this->lastProductCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a Product object to this object
	 * through the Product foreign key attribute.
	 *
	 * @param      Product $l Product
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProduct(Product $l)
	{
		if ($this->collProducts === null) {
			$this->initProducts();
		}
		if (!in_array($l, $this->collProducts, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProducts, $l);
			$l->setProductGroup($this);
		}
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collProductGroupI18ns) {
				foreach ((array) $this->collProductGroupI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProducts) {
				foreach ((array) $this->collProducts as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProductGroupI18ns = null;
		$this->collProducts = null;
	}


  /**
   * Returns the culture.
   *
   * @return string The culture
   */
  public function getCulture()
  {
    return $this->culture;
  }

  /**
   * Sets the culture.
   *
   * @param string $culture The culture to set
   *
   * @return void
   */
  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getTitle($culture = null)
  {
    return $this->getCurrentProductGroupI18n($culture)->getTitle();
  }

  public function setTitle($value, $culture = null)
  {
    $this->getCurrentProductGroupI18n($culture)->setTitle($value);
  }

  protected $current_i18n = array();

  public function getCurrentProductGroupI18n($culture = null)
  {
    if (is_null($culture))
    {
      $culture = is_null($this->culture) ? sfPropel::getDefaultCulture() : $this->culture;
    }

    if (!isset($this->current_i18n[$culture]))
    {
      $obj = ProductGroupI18nPeer::retrieveByPK($this->getId(), $culture);
      if ($obj)
      {
        $this->setProductGroupI18nForCulture($obj, $culture);
      }
      else
      {
        $this->setProductGroupI18nForCulture(new ProductGroupI18n(), $culture);
        $this->current_i18n[$culture]->setCulture($culture);
      }
    }

    return $this->current_i18n[$culture];
  }

  public function setProductGroupI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addProductGroupI18n($object);
  }


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProductGroup:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProductGroup::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseProductGroup
