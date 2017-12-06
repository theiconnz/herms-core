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

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HermsCore\Manager\UrlManager;

/**
 * UrlFactory Class
 *
 * @category Service
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class UrlFactory implements FactoryInterface
{
    /**
     * Factory for zend-servicemanager v3.
     *
     * @param ContainerInterface $container
     * @param string $name
     * @param null|array $options
     * @return Logger
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null)
    {
        return new UrlManager();
    }
    
    /**
     * Factory for zend-servicemanager v2.
     *
     * Proxies to `__invoke()`.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Logger
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, Service\UrlFactory::class);
    }
}