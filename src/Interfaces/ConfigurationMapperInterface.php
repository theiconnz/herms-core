<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Interface
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Interfaces;

/**
 * ConfigurationMapperInterface
 *
 * @category Interface
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
interface ConfigurationMapperInterface
{
     /**
      * Find configuration by name
      *
	  * @param string $name
	  * @return ConfigurationInterface
      * @throws \InvalidArgumentException
      */
     public function findByName($name);
	 
     /**
	 *
	 * @return array|ConfigurationInterface[]
	 */
     public function findAll();
	 
	 
	/**
	 *
	 * @return array|ConfigurationInterface[]
	 */
     public function save(\HermsCore\Interfaces\ConfigurationInterface $config, $unique=true);
}