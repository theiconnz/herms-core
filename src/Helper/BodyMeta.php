<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Helper
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\Session\Container;

/**
 * BodyMeta tag helper class
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class BodyMeta extends AbstractHelper
implements ServiceLocatorAwareInterface
{
    public $output = '';
    public $serviceLocator;
    public $controller_action;
    public $serviceManager;

    /**
     * Invoke BodyMeta Helper.
     *
     * @return string Return Meta Cache
     */
    public function __invoke()
    {
        $this->serviceManager = $this->getServiceLocator()->getServiceLocator();
        $this->getControllerAction();
        $metaCache = $this->getBodyMetaCache();
        if (! $metaCache ) {
            return '';              
        }
        return $metaCache;
    }

    /**
     * Get Controller action for cache.
     *
     * @return void
     */
    public function getControllerAction()
    {
        $router     = $this->serviceManager->get('router');
        $request    = $this->serviceManager->get('request');
        $routeMatch = $this->serviceManager->get('Application')->getMvcEvent()->getRouteMatch();
        $routeMatch = $router->match($request);
        if (!is_null($routeMatch)) {
            //echo $routeMatch->getMatchedRouteName();
            $controller =  strtolower($routeMatch->getParam('controller'));
            $action = strtolower($routeMatch->getParam('action'));
            $this->controller_action = sprintf("%s_%s", strtolower($controller), strtolower($action));
        } else {
            $this->controller_action = 'application_index';
        }
    }

    /**
     * Get Saved controller_action body meta cache
     *
     * @return string|false
     */
    public function getBodyMetaCache()
    {
        $session = new Container('application_session');
        $theme = ( isset($session->theme) && !empty($session->theme) )? $session->theme:'default';
        
        $success = false;
        $cache = $this->serviceManager->get('cache');
        $layoutList = $cache->getItem(md5("bodymeta_".$theme.$this->controller_action), $success);
        if($success) {
            return $layoutList;
        }
        return false;
    }
    
    // @codingStandardsIgnoreStart
    public function setServiceLocator(ServiceLocatorInterface $servicelocator)
    {
        $this->serviceLocator = $servicelocator;
    }
    
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
    // @codingStandardsIgnoreEnd
}