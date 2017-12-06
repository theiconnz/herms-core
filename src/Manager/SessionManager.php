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

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SessionManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class SessionManager
{
    protected $servicelocator;

    /**
     * Constructor
     *
     * @param ServiceLocatorInterface $servicelocator ServiceLocatorInterface
     *
     * @return void
     */
    public function __construct(ServiceLocatorInterface $servicelocator)
    {
        $this->servicelocator = $servicelocator;        
    }

}