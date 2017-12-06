<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Manager
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Manager;

use HermsCore\Interfaces\ConfigurationServiceInterface;
use HermsCore\Mapper\DbConfigurationMapper;
/**
 * ConfigurationManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class ConfigurationManager implements ConfigurationServiceInterface
{
	/*
	* @var HermsCore\Interfaces\ConfigurationMapperInterface
	*/
	protected $configMapper;
	
	public function __construct(DbConfigurationMapper $configMapper)
	{
		$this->configMapper = $configMapper;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function findAllConfiguration()
	{
		return $this->configMapper->findAll();
	}
	
	/**
	* {@inheritDoc}
	*/
	public function findByName($name)
	{
		return $this->configMapper->findByName($name);	
	}
	
	
	/**
	* {@inheritDoc}
	*/
	public function save(\HermsCore\Interfaces\ConfigurationInterface $config)
	{
		return $this->configMapper->save($config);	
	}
	
	public function getConfiguration(){
		$config = $this->findAllConfiguration();
		return $this->mapConfigurations($config);
	}
	
	protected function mapConfigurations($configuration)
	{
		$config = array();
		foreach($configuration as $key => $value ){
			$config[$value["name"]]=$value["value"];
		}
		return $config;
	}
	
	public function configurationCleanup($config)
	{
		$newconfig = array();
		foreach( $config as $key => $value ) {
			$tmp = array(
				'name' => $key,
				'value' => $value
			);
			array_push($newconfig, $tmp);
		}
		return $newconfig;
	}
}