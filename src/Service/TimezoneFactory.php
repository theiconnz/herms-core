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
use HermsCore\Manager\TimezoneManager;

/**
 * TimezoneFactory Class
 *
 * @category Service
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class TimezoneFactory implements FactoryInterface
{
    /**
    * Return Timezone Manager
    *
    * @param ServiceLocatorInterface $servicelocator
    * @return object
    */
    public function createService(ServiceLocatorInterface $servicelocator)
    {
        return new TimezoneManager($servicelocator);
    }
}