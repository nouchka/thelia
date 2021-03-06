<?php

namespace Thelia\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\IgnoredModuleHook as ChildIgnoredModuleHook;
use Thelia\Model\IgnoredModuleHookQuery as ChildIgnoredModuleHookQuery;
use Thelia\Model\Map\IgnoredModuleHookTableMap;

/**
 * Base class that represents a query for the 'ignored_module_hook' table.
 *
 *
 *
 * @method     ChildIgnoredModuleHookQuery orderByModuleId($order = Criteria::ASC) Order by the module_id column
 * @method     ChildIgnoredModuleHookQuery orderByHookId($order = Criteria::ASC) Order by the hook_id column
 * @method     ChildIgnoredModuleHookQuery orderByMethod($order = Criteria::ASC) Order by the method column
 * @method     ChildIgnoredModuleHookQuery orderByClassname($order = Criteria::ASC) Order by the classname column
 * @method     ChildIgnoredModuleHookQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildIgnoredModuleHookQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildIgnoredModuleHookQuery groupByModuleId() Group by the module_id column
 * @method     ChildIgnoredModuleHookQuery groupByHookId() Group by the hook_id column
 * @method     ChildIgnoredModuleHookQuery groupByMethod() Group by the method column
 * @method     ChildIgnoredModuleHookQuery groupByClassname() Group by the classname column
 * @method     ChildIgnoredModuleHookQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildIgnoredModuleHookQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildIgnoredModuleHookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIgnoredModuleHookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIgnoredModuleHookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIgnoredModuleHookQuery leftJoinModule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Module relation
 * @method     ChildIgnoredModuleHookQuery rightJoinModule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Module relation
 * @method     ChildIgnoredModuleHookQuery innerJoinModule($relationAlias = null) Adds a INNER JOIN clause to the query using the Module relation
 *
 * @method     ChildIgnoredModuleHookQuery leftJoinHook($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hook relation
 * @method     ChildIgnoredModuleHookQuery rightJoinHook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hook relation
 * @method     ChildIgnoredModuleHookQuery innerJoinHook($relationAlias = null) Adds a INNER JOIN clause to the query using the Hook relation
 *
 * @method     ChildIgnoredModuleHook findOne(ConnectionInterface $con = null) Return the first ChildIgnoredModuleHook matching the query
 * @method     ChildIgnoredModuleHook findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIgnoredModuleHook matching the query, or a new ChildIgnoredModuleHook object populated from the query conditions when no match is found
 *
 * @method     ChildIgnoredModuleHook findOneByModuleId(int $module_id) Return the first ChildIgnoredModuleHook filtered by the module_id column
 * @method     ChildIgnoredModuleHook findOneByHookId(int $hook_id) Return the first ChildIgnoredModuleHook filtered by the hook_id column
 * @method     ChildIgnoredModuleHook findOneByMethod(string $method) Return the first ChildIgnoredModuleHook filtered by the method column
 * @method     ChildIgnoredModuleHook findOneByClassname(string $classname) Return the first ChildIgnoredModuleHook filtered by the classname column
 * @method     ChildIgnoredModuleHook findOneByCreatedAt(string $created_at) Return the first ChildIgnoredModuleHook filtered by the created_at column
 * @method     ChildIgnoredModuleHook findOneByUpdatedAt(string $updated_at) Return the first ChildIgnoredModuleHook filtered by the updated_at column
 *
 * @method     array findByModuleId(int $module_id) Return ChildIgnoredModuleHook objects filtered by the module_id column
 * @method     array findByHookId(int $hook_id) Return ChildIgnoredModuleHook objects filtered by the hook_id column
 * @method     array findByMethod(string $method) Return ChildIgnoredModuleHook objects filtered by the method column
 * @method     array findByClassname(string $classname) Return ChildIgnoredModuleHook objects filtered by the classname column
 * @method     array findByCreatedAt(string $created_at) Return ChildIgnoredModuleHook objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildIgnoredModuleHook objects filtered by the updated_at column
 *
 */
abstract class IgnoredModuleHookQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Thelia\Model\Base\IgnoredModuleHookQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\Thelia\\Model\\IgnoredModuleHook', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIgnoredModuleHookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIgnoredModuleHookQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \Thelia\Model\IgnoredModuleHookQuery) {
            return $criteria;
        }
        $query = new \Thelia\Model\IgnoredModuleHookQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$module_id, $hook_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildIgnoredModuleHook|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = IgnoredModuleHookTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IgnoredModuleHookTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildIgnoredModuleHook A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `MODULE_ID`, `HOOK_ID`, `METHOD`, `CLASSNAME`, `CREATED_AT`, `UPDATED_AT` FROM `ignored_module_hook` WHERE `MODULE_ID` = :p0 AND `HOOK_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildIgnoredModuleHook();
            $obj->hydrate($row);
            IgnoredModuleHookTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildIgnoredModuleHook|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(IgnoredModuleHookTableMap::MODULE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(IgnoredModuleHookTableMap::HOOK_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the module_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModuleId(1234); // WHERE module_id = 1234
     * $query->filterByModuleId(array(12, 34)); // WHERE module_id IN (12, 34)
     * $query->filterByModuleId(array('min' => 12)); // WHERE module_id > 12
     * </code>
     *
     * @see       filterByModule()
     *
     * @param     mixed $moduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByModuleId($moduleId = null, $comparison = null)
    {
        if (is_array($moduleId)) {
            $useMinMax = false;
            if (isset($moduleId['min'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $moduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moduleId['max'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $moduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $moduleId, $comparison);
    }

    /**
     * Filter the query on the hook_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHookId(1234); // WHERE hook_id = 1234
     * $query->filterByHookId(array(12, 34)); // WHERE hook_id IN (12, 34)
     * $query->filterByHookId(array('min' => 12)); // WHERE hook_id > 12
     * </code>
     *
     * @see       filterByHook()
     *
     * @param     mixed $hookId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByHookId($hookId = null, $comparison = null)
    {
        if (is_array($hookId)) {
            $useMinMax = false;
            if (isset($hookId['min'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $hookId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hookId['max'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $hookId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $hookId, $comparison);
    }

    /**
     * Filter the query on the method column
     *
     * Example usage:
     * <code>
     * $query->filterByMethod('fooValue');   // WHERE method = 'fooValue'
     * $query->filterByMethod('%fooValue%'); // WHERE method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $method The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByMethod($method = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($method)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $method)) {
                $method = str_replace('*', '%', $method);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::METHOD, $method, $comparison);
    }

    /**
     * Filter the query on the classname column
     *
     * Example usage:
     * <code>
     * $query->filterByClassname('fooValue');   // WHERE classname = 'fooValue'
     * $query->filterByClassname('%fooValue%'); // WHERE classname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByClassname($classname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classname)) {
                $classname = str_replace('*', '%', $classname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::CLASSNAME, $classname, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(IgnoredModuleHookTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IgnoredModuleHookTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Module object
     *
     * @param \Thelia\Model\Module|ObjectCollection $module The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByModule($module, $comparison = null)
    {
        if ($module instanceof \Thelia\Model\Module) {
            return $this
                ->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $module->getId(), $comparison);
        } elseif ($module instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(IgnoredModuleHookTableMap::MODULE_ID, $module->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByModule() only accepts arguments of type \Thelia\Model\Module or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Module relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function joinModule($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Module');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Module');
        }

        return $this;
    }

    /**
     * Use the Module relation Module object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ModuleQuery A secondary query class using the current class as primary query
     */
    public function useModuleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinModule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Module', '\Thelia\Model\ModuleQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Hook object
     *
     * @param \Thelia\Model\Hook|ObjectCollection $hook The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function filterByHook($hook, $comparison = null)
    {
        if ($hook instanceof \Thelia\Model\Hook) {
            return $this
                ->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $hook->getId(), $comparison);
        } elseif ($hook instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(IgnoredModuleHookTableMap::HOOK_ID, $hook->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByHook() only accepts arguments of type \Thelia\Model\Hook or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hook relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function joinHook($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hook');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Hook');
        }

        return $this;
    }

    /**
     * Use the Hook relation Hook object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\HookQuery A secondary query class using the current class as primary query
     */
    public function useHookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHook($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hook', '\Thelia\Model\HookQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIgnoredModuleHook $ignoredModuleHook Object to remove from the list of results
     *
     * @return ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function prune($ignoredModuleHook = null)
    {
        if ($ignoredModuleHook) {
            $this->addCond('pruneCond0', $this->getAliasedColName(IgnoredModuleHookTableMap::MODULE_ID), $ignoredModuleHook->getModuleId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(IgnoredModuleHookTableMap::HOOK_ID), $ignoredModuleHook->getHookId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ignored_module_hook table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IgnoredModuleHookTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IgnoredModuleHookTableMap::clearInstancePool();
            IgnoredModuleHookTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildIgnoredModuleHook or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildIgnoredModuleHook object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IgnoredModuleHookTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IgnoredModuleHookTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        IgnoredModuleHookTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IgnoredModuleHookTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(IgnoredModuleHookTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(IgnoredModuleHookTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(IgnoredModuleHookTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(IgnoredModuleHookTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(IgnoredModuleHookTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildIgnoredModuleHookQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(IgnoredModuleHookTableMap::CREATED_AT);
    }

} // IgnoredModuleHookQuery
