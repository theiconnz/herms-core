<?php
/**
 * Herms Core (https://theicon.co.nz/)
 *
 * Module
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Model;

use HermsCore\Interfaces\ConfigurationInterface;
/**
 * Configuration Model
 *
 * @category Model
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class Configuration implements ConfigurationInterface
{
	/*
	* @var int $id Id
	*/
	protected $id;
	
	/*
	* @var string $name Name
	*/
	protected $name;
	
	/*
	* @var string $value Value
	*/
	protected $value;
	
	/*
	* @var int $entity Entity
	*/
	protected $entity = 0;
	
	/**
	* {@inheritDoc}
	*/
	public function getId()
	{
		return $this->id;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getName()
	{
		return $this->name;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getValue()
	{
		return $this->value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getEntity()
	{
		return $this->entity;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setId($value)
	{
		$this->id = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setName($value)
	{
		$this->name = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setValue($value)
	{
		$this->value = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setEntity($value)
	{
		$this->entity = $value;
	}
}