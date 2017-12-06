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
 * Success Class
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class Success extends AbstractHelper
{
    protected $message;

    /**
     * Invoke Success Message Helper.
     *
     * @return string Return HTML formated Message
     */
    public function __invoke()
    {
        $success = new Container('success');
        $message = $success->offsetGet('message');
        $success->offsetUnset('message');
        return (!empty($message) ) ? 
        sprintf('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-check"></i> Success!</h4>%s</div>', $message) : '';
    }
}