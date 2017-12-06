<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Manager
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Manager;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * TimezoneManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class TimezoneManager
{
    protected $servicelocator;

    protected $timezone = 'UTC';
    
    /**
     * Constructor.
     *
     * @param ServiceLocatorInterface $servicelocator ServiceLocatorInterface
     *
     * @return void
     */
    public function __construct(ServiceLocatorInterface $servicelocator)
    {
        $this->servicelocator = $servicelocator;     
    }

    /**
     * Set system timezone
     *
     * @param $zone string Timezone
     *
     * @return void
     */
    public function setTimeZone($zone)
    {
        $this->timezone = $zone;
    }

    /**
     * Set system timezone
     *
     * @param $zone string Timezone
     *
     * @return void
     */
    public function getTimeZone($zone)
    {
        return $this->timezone;
    }
 
     /**
     * Set system timezone
     *
     * @param $zone string Timezone
     *
     * @return void
     */
    public function changeTimeZone()
    {
        date_default_timezone_set($this->timezone);
    }
}