<?php
namespace HermsCore\Controller;
/**
 * Herms Home (https://theicon.co.nz/)
 *
 * FrontController
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsHome
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */

use Zend\Mvc\Controller\AbstractActionController;
use Interop\Container\ContainerInterface;
use Zend\View\Helper\ViewModel;

/**
 * FrontController Class
 *
 * @category Controller
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */

class FrontController extends AbstractActionController
{
    /*
     * @var Zend\ServiceManager\ServiceLocatorInterface
     */
    protected $services;
    /*
     * @var Interop\Container\ContainerInterface
     */
    protected $container;
    
    public function __construct(
        ContainerInterface $container
        ) {
        $this->container = $container;
        $this->getConfigData();
    }

    /**
     * Get Application Configuration Data to View
     *
     * 
     */
    protected function getConfigData()
    {
        $configuration = $this->container->get('config');
        $this->layout()->setVariable('appdata', $configuration["AppData"]);
    }
}

