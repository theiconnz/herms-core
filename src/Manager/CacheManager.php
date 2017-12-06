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

use Zend\Cache\StorageFactory;
/**
 * CacheManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class CacheManager
{
    protected $cache;
    public function __construct()
    {
        $cache = StorageFactory::factory([
            'adapter' => [
                'name'    => 'filesystem',
            ],
            'plugins' => [
                'exception_handler' => ['throw_exceptions' => false],
            ],
        ]);     
        $this->cache = $cache; 
    }
    
    
    public function getCache()
    {
        return $this->cache;
    }
    
}