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
 * ConfigurationServiceInterface
 *
 * @category Interface
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
interface ConfigurationServiceInterface
{
     /**
      * Return all Configuration
      *
      * @return array|ConfigurationInterface[]
      */
     public function findAllConfiguration();
	 
     /**
      * Return all Configuration
      *
      * @param  string $name 
	  * @return null|ConfigurationInterface
      */
     public function findByName($name);
	 
     /**
      * Save all configuration
      *
      * @param  HermsCore\Interfaces\ConfigurationInterface $config 
	  *
	  * @return CustomersInterface
      */
     public function save(\HermsCore\Interfaces\ConfigurationInterface $config);
}