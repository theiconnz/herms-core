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
 * ConfigurationInterface
 *
 * @category Interface
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
interface ConfigurationInterface
{
     /**
      * Return configuration id
      *
      * @return int
      */
     public function getId();

     /**
      * Return the name
      *
      * @return string
      */
     public function getName();

     /**
      * Return value
      *
      * @return string
      */
     public function getValue();
	 
     /**
      * Return configuration entity
      *
      * @return void|int
      */
     public function getEntity();
	 
     /**
      * Set configuration id
	  *
      * @param int $value Value
      */
     public function setId($value);

     /**
      * Set the name
      *
      * @param string $value Value
      */
     public function setName($value);

     /**
      * Set value
      *
      * @param string $value Value
      */
     public function setValue($value);
	 
     /**
      * Set configuration entity
      *
      * @param int $value Value
      */
     public function setEntity($value);
}