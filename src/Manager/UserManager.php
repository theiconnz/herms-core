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

/**
 * UserManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class UserManager
{
    
    protected $service;
    
    /**
     * Constructor.
     *
     * @param ServiceLocatorInterface $servicelocator ServiceLocatorInterface
     *
     * @return void
     */
    public function __construct($container)
    {
       $this->service = $container; 
    }

    /**
     * Get encrypted password.
     *
     * @param $u string Username
     * @param $p string Password
     *
     * @return string
     */
    public function getEncryptedPassword($u, $p)
    {
        $configdata = $this->service->get('config');
        $username = sprintf("%s", trim($u));
        $pass = sprintf("%s", trim($p));
        $salt = md5($username);
        
        return sprintf("%s:%s",md5($configdata["encription_key"].$pass),$salt);
    }
}