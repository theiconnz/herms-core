<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Service
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HermsCore\Manager\MenuManager;

/**
 * MenuFactory Class
 *
 * @category Service
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class MenuFactory implements FactoryInterface
{
    /**
    * Return Menu Object
    *
    * @param ServiceLocatorInterface $servicelocator
    * @return object
    */
    public function createService(ServiceLocatorInterface $servicelocator)
    {
        return new MenuManager($servicelocator);
    }
}