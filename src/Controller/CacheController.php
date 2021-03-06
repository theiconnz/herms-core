<?php
/**
 * Cache Controller (https://theicon.co.nz/)
 *
 * Module
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Controller;

use RuntimeException;
use Zend\View\Model\ViewModel;
use Zend\Console\Request as ConsoleRequest;
use Zend\Math\Rand;

/**
 * Cache Controller Class
 *
 * @category Controller
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class CacheController extends FrontController
{
    /**
    * Index action
    *
    * @return string
    */
    public function indexAction()
    {
        die("A");
    }
	
    public function resetpasswordAction()
    {
        return "Done! $userEmail has received an email with his new password.\n";
    }
}