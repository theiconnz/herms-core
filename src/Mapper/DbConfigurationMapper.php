<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Mapper
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Mapper;

use HermsCore\Interfaces\ConfigurationMapperInterface;
use HermsCore\Interfaces\ConfigurationInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\Hydrator\HydratorInterface;
/**
 * ZendDbSqlMapper Mapper
 *
 * @category Mapper
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class DbConfigurationMapper implements ConfigurationMapperInterface
{
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	/**
	* @var \Zend\Stdlib\Hydrator\HydratorInterface
	*/
	protected $hydrator;
	
	/**
	* @var \HermsCore\Model\ConfigurationInterface
	*/
	protected $configurationtPrototype;
	
	
	/**
	* @param AdapterInterface  $dbAdapter
	* @param HydratorInterface $hydrator
	* @param PostInterface    $postPrototype
	*/
	public function __construct(
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
		ConfigurationInterface $configurationType
	) {
		$this->dbAdapter      = $dbAdapter;
		$this->hydrator       = $hydrator;
		$this->configurationtPrototype  = $configurationType;
	}

	/*
	* @param string $name
	*
	* @return ConfigurationInterface
	* @throws \InvalidArgumentException
	*/
	public function findByName($name)
	{
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from('configuration');
		$select->where(['name = ?' => $name]);
		$select->limit(1);

		$buildsql   = $sql->buildSqlString($select);
		$result = $this->dbAdapter->query(
			$buildsql,
			$this->dbAdapter::QUERY_MODE_EXECUTE
		)->toArray();
		
		if ($result) {
			return $this->hydrator->hydrate(
				$result[0], 
				$this->configurationtPrototype
			);
		}
		return false;
		throw new \InvalidArgumentException("Error config name:{$name} not found.");
	}

	/*
	* @return array|ConfigurationInterface[]
	*/
	public function findAll()
	{
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('configuration');
		$buildsql   = $sql->buildSqlString($select);
		$result = $this->dbAdapter->query(
			$buildsql,
			$this->dbAdapter::QUERY_MODE_EXECUTE
		)->toArray();
		return $result;
	}
	

	/*
	* @return array|ConfigurationInterface[]
	*/
	public function save(
		\HermsCore\Interfaces\ConfigurationInterface $config,
		$unique=true
	) {
		if($config) {
			$sql	= new Sql($this->dbAdapter);
			if ($unique) {
				$con = $this->findByName($config->getName());
				if ($con) {
					$config->setId($con->getId());
				}
			}
			
			if(!empty($config->getId())){
				$query = $sql->update('configuration');
				$query->set(
					[
						'name' => $config->getName(),
						'value' => $config->getValue(),
						'entity' => $config->getEntity(),
					]
				);
				$query->where(['id = ?' => $config->getId()]);
			} else {
				//\Zend\Debug\Debug::dump($config);die();
				$query = $sql->insert('configuration');
				$query->columns(
					[
						$config->getName() => 'name',
						$config->getValue() => 'value',
						$config->getEntity() => 'entity',
					]
				);
			}
			$buildsql = $sql->buildSqlString($query);
			//\Zend\Debug\Debug::dump($buildsql);die();
			$result = $this->dbAdapter->query(
				$buildsql,
				$this->dbAdapter::QUERY_MODE_EXECUTE
			);
			if($result) {
				return true;
			}
			return false;
		}
	}

}