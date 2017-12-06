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
use Zend\Hydrator\ClassMethods;
use HermsCore\Mapper\DbAdministratorMapper;
use HermsCore\Model\Administrator;

/**
 * DbAdministratorMapperFactory Class
 *
 * @category Service
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class DbAdministratorMapperFactory implements FactoryInterface
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
        array $options = null
	) {
		return new DbConfigurationMapper(
			$container->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new Administrator()
		);
	}
	
    /**
     * Factory for zend-servicemanager v2.
     *
     * Proxies to `__invoke()`.
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(
		ServiceLocatorInterface $serviceLocator
	) {
        return $this(
			$serviceLocator,
			HermsCore\Service\DbConfigurationMapperFactory
		);
    }
}