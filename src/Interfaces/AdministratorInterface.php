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
 * AdministratorInterface
 *
 * @category Interface
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
interface AdministratorInterface
{
     /**
      * Return Admin id
      *
      * @return int
      */
     public function getAdminId();

     /**
      * Admin email
      *
      * @return string
      */
     public function getAdminEmail();

     /**
      * Return pass
      *
      * @return string
      */
     public function getAdminPassword();
	 
     /**
      * Return level
      *
      * @return int
      */
     public function getAdminLevel();
	 
     /**
      * Return status
      *
      * @return int
      */
     public function getAdminStatus();
	 
     /**
      * Set id
	  *
      * @param int $value Value
      */
     public function setAdminId($value);

     /**
      * Set email
      *
      * @param string $value Value
      */
     public function setAdminEmail($value);

     /**
      * Set password
      *
      * @param string $value Value
      */
     public function setAdminPassword($value);
	 
     /**
      * Set admin level
      *
      * @param int $value Value
      */
     public function setAdminLevel($value);
	 
	 
     /**
      * Set admin status
      *
      * @param int $value Value
      */
     public function setAdminStatus($value);
}