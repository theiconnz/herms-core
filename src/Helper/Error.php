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

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

/**
 * Error Class
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class Error extends AbstractHelper
{
    protected $message;

    /**
     * Invoke Error Helper.
     *
     * @return string Return HTML formated Message
     */
    public function __invoke()
    {
        $error = new Container('error');
        $message = $error->offsetGet('message');//die($message);
        $error->offsetUnset('message');
        return (!empty($message)) ? 
        sprintf('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-warning"></i> Error!</h4>%s</div>', $message) : '';
    }
}