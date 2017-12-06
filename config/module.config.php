<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Config
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
 
namespace HermsCore;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'cache' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/cache',
                    'defaults' => [
                        'controller' => Controller\CacheController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CacheController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'template_map' => [
            'cache/index' => __DIR__ . '/../view/zbe-core/index/index.phtml',
            ],
    ],
    'view_helpers' => [
        'invokables' => [
            'BodyMeta' => 'HermsCore\Helper\BodyMeta',
            'GetGravatar' => 'HermsCore\Helper\getGravatar',
            'SecureKey' => 'HermsCore\Helper\SecureKey',
            'Success'   => 'HermsCore\Helper\Success',
            'Error'   => 'HermsCore\Helper\Error',
			'CustomMessage'   => 'HermsCore\Helper\CustomMessage',
          ],
    ],
    'service_manager' => [
        'factories' => [
            'UrlManager' => Service\UrlFactory::class,
            'CacheManager' => Service\CacheFactory::class,
			'HermsCore\Service\ConfigurationFactory' => Service\ConfigurationFactory::class,
			'HermsCore\Mapper\DbConfigurationMapper' => 'HermsCore\Service\DbConfigurationMapperFactory',
			'Zend\Db\Adapter\Adapter'  => 'Zend\Db\Adapter\AdapterServiceFactory',
          ],
    ],

];
